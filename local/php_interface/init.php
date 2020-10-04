<?
/*
You can place here your functions and event handlers

AddEventHandler("module", "EventName", "FunctionName");
function FunctionName(params)
{
	//code
}
*/

define("ADDRESS_1", 282); // ID контактов на Ивановского
define("ADDRESS_2", 283); // ID контактов на Ломоносова

function writeLog($record, $filename){
	$filenamePath = $_SERVER["DOCUMENT_ROOT"].'/logs/'.$filename.'.txt';
	if(file_exists($filenamePath)){
		file_put_contents($filenamePath, PHP_EOL.date('d.m.Y-H:i:s').PHP_EOL.$record, FILE_APPEND);
	}else{
		file_put_contents($filenamePath, date('d.m.Y-H:i:s').PHP_EOL.$record);
	}
}

function includeArea($file){
	global $APPLICATION;
	$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
	        "AREA_FILE_SHOW" => "file", 
	        "PATH" => "/include/".$file.".php"
	    )
	);	
}

function includeAreaString($file, $phone = false){
	$str = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/include/".$file.".php");
	if($phone){
		$str = preg_replace("/[^\+0-9]/", "", $str);
	}
	return $str;
}

function declOfNum($number, $titles){
   $cases = array (2, 0, 1, 1, 1, 2);
   return $titles[ ($number%100 > 4 && $number %100 < 20) ? 2 : $cases[min($number%10, 5)] ];
}

function mb_ucfirst_custom($str, $encoding='UTF-8'){
	$str = mb_ereg_replace('^[\ ]+', '', $str);
	$str = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding).
		   mb_substr($str, 1, mb_strlen($str), $encoding);
	return $str;
}

function getRusMonth($i){
   $array = array("января","февраля","марта","апреля","мая","июня","июля","августа","сентября","октября","ноября","декабря");
   return $array[$i-1];
}

function getRusDate($date){
   $arDate = explode(".", date("d.m.Y", strtotime($date)));
   $arDate[1] = getRusMonth($arDate[1]);
   return implode(" ", $arDate);
}

function getEnumsUnique(){
	$propsForOptions = array(
		"MARK" => array(),
		"TRANSMISSION" => array(),
		"DRIVE" => array(),
		"RUDDER" => array()
	);
	$arFilter = Array("IBLOCK_ID" => 1, "ACTIVE" => "Y");
	$res = CIBlockElement::GetList(Array("ID" => "ASC"), $arFilter, false, false, Array());
	while($ob = $res->GetNextElement()){
		// $arFields = $ob->GetFields();
		$arProps = $ob->GetProperties();
		$propsForOptions["MARK"][$arProps["MARK"]["VALUE_ENUM_ID"]] = $arProps["MARK"]["VALUE"];
		$propsForOptions["TRANSMISSION"][$arProps["TRANSMISSION"]["VALUE_ENUM_ID"]] = $arProps["TRANSMISSION"]["VALUE"];
		$propsForOptions["DRIVE"][$arProps["DRIVE"]["VALUE_ENUM_ID"]] = $arProps["DRIVE"]["VALUE"];
		$propsForOptions["RUDDER"][$arProps["RUDDER"]["VALUE_ENUM_ID"]] = $arProps["RUDDER"]["VALUE"];
	}
	foreach ($propsForOptions as $key => $value) {
		$propsForOptions[$key] = array_diff(array_unique($propsForOptions[$key]), array(''));
	}

	return $propsForOptions;
}

function convertPrice($price){
	return (!empty($price)) ? rtrim(rtrim(number_format($price, 1, '.', ' '),"0"),".") : "";
}

function sendMessage($messaggio) {
	$token = "bot1367858613:AAHZ828pwCSNN7Jls0PURxLcoLY4yuoTlbY";
	$url = "https://api.telegram.org/" . $token . "/sendMessage?chat_id=-1001440295126";
	$url = $url . "&parse_mode=HTML&text=" . urlencode($messaggio);
	$ch = curl_init();
	$optArray = array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true
	);
	curl_setopt_array($ch, $optArray);
	$result = curl_exec($ch);
	curl_close($ch);
}

AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", Array("MyClass", "OnBeforeIBlockElementUpdateHandler"));
AddEventHandler("iblock", "OnAfterIBlockElementUpdate", Array("MyClass", "OnAfterIBlockElementUpdateHandler"));
class MyClass
{
	// создаем обработчик события "OnBeforeIBlockElementUpdate"
    function OnBeforeIBlockElementUpdateHandler(&$arFields)
    {
    	$GLOBALS["VIN"] = "";
    	if($arFields["IBLOCK_ID"] == 1){
    		$db_props = CIBlockElement::GetProperty($arFields["IBLOCK_ID"], $arFields["ID"], Array(), Array("CODE"=>"VIN"));
			if($ar_props = $db_props->Fetch()){
				$GLOBALS["VIN"] = $ar_props["VALUE"];
			}
    	}
    }
       
    // создаем обработчик события "OnAfterIBlockElementUpdate"
    function OnAfterIBlockElementUpdateHandler(&$arFields)
    {
        if($arFields["IBLOCK_ID"] == 1){
        	// получить VIN
        	$db_props = CIBlockElement::GetProperty($arFields["IBLOCK_ID"], $arFields["ID"], Array(), Array("CODE"=>"VIN"));
			if($ar_props = $db_props->Fetch()){
				if($ar_props["VALUE"] && $GLOBALS["VIN"] != $ar_props["VALUE"]){
					// генерация нового отчета avtocod
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, "https://b2bapi.avtocod.ru/b2b/api/v1/dev/user/reports/default/_make");
					curl_setopt($ch, CURLOPT_HTTPHEADER, array(
						'Content-Type: application/json',
						'Authorization: AR-REST ZGVmYXVsdEB0ZXN0OjE0ODMyMjg4MDA6MTU3NjgwMDAwOnVjQk9kOGZhc3hIMkR3bVgrOHhhcVE9PQ=='
					));
					$request = json_encode(array(
						"queryType" => "VIN",
						"query" => $ar_props["VALUE"]
					));
					curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_HEADER, false);

					$jsonMakeResult = curl_exec($ch);
					curl_close($ch);

					$arMakeResult = json_decode($jsonMakeResult);

					$PROPS = array();
					if($arMakeResult->state == "ok"){
						$uid = $arMakeResult->data[0]->uid;
						if($uid){
							// запросить новый отчет
							sleep(5);
							$ch = curl_init();
							curl_setopt($ch, CURLOPT_URL, "https://b2bapi.avtocod.ru/b2b/api/v1/dev/user/reports/".$uid."?_detailed=true&_content=true");
							curl_setopt($ch, CURLOPT_HTTPHEADER, array(
								'Content-Type: application/json',
								'Authorization: AR-REST ZGVmYXVsdEB0ZXN0OjE0ODMyMjg4MDA6MTU3NjgwMDAwOnVjQk9kOGZhc3hIMkR3bVgrOHhhcVE9PQ=='
							));
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HEADER, false);
							$jsonResult = curl_exec($ch);
							curl_close($ch);

							$arResult = json_decode($jsonResult);

							//розыск
							$stealings = $arResult->data[0]->content->stealings->count;
							$PROPS["STEALINGS"] = $stealings ? "Да" : "Нет";
							//ограничения
							$restrictions = $arResult->data[0]->content->restrictions->count;
							$PROPS["RESTRICTIONS"] = $restrictions ? "Да" : "Нет";
							//количество владельцев
							$ownership = array(
								"items" => $arResult->data[0]->content->ownership->history->items,
								"count" => $arResult->data[0]->content->ownership->history->count
							);
							$PROPS["OWNERSHIP"] = json_encode($ownership);

							CIBlockElement::SetPropertyValuesEx($arFields["ID"], $arFields["IBLOCK_ID"], $PROPS);
							writeLog("Данные из автокод получены. ID = ".$arFields["ID"], "avtocod");
						}
					}else{
						writeLog("Ошибка! state != ok. ID = ".$arFields["ID"], "avtocod");
					}
				}
			}else{
				writeLog("Ошибка! Не удалось получить свойство. ID = ".$arFields["ID"], "avtocod");
			}
        }
    }
}

?>