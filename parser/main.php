<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>

<?
CModule::IncludeModule("iblock");

writeLog("Старт!", "parser");

function parsePage($did, $page, &$resLinksIDs, &$pageExist){
	$ch = curl_init();
	if($page == 1){
		$url = 'https://auto.drom.ru/?did='.$did;
	}else{
		$url = 'https://auto.drom.ru/page'.$page.'/?did='.$did;
	}
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);

	$html = curl_exec($ch);
	$html = preg_replace('/<head>.*<\/head>/is', '', $html);
	$html = preg_replace('/<style.+?>.*?<\/style>/is', '', $html);

	$isWinCharset = mb_check_encoding($html, "windows-1251");
	if ($isWinCharset) {
	    $html = iconv("windows-1251", "utf-8", $html);
	}
	curl_close($ch);  

	$dom = new DOMDocument;
	$dom->loadHTML('<?xml encoding="utf-8" ?>'.$html);
	$dom->saveHTML();

	$links = $dom->getElementsByTagName('a');

	$arLinksIDsRaw = array();
	for ($i = 0; $i < $links->length; $i++) {
		$link = $links->item($i);
		$arLinkNew = array();
	    if($link->getAttribute('data-ftid') == 'bulls-list_bull'){
	    	$arLinkNew["link"] = $link->getAttribute('href');
	    	$spans = $link->getElementsByTagName('span');
	    	for ($j = 0; $j < $spans->length; $j++) {
	    		$span = $spans->item($j);
	    		if($span->getAttribute('data-ftid') == 'bull_title'){
	    			$arLinkNew["title"] = str_replace("Лада", "LADA", $span->textContent);
	    			$arLinkNew["active"] = !($span->getAttribute('data-crossed-bull') == 'true');
	    		}
	    	}
	    }
	    if(!empty($arLinkNew)){
	    	$arLinksIDsRaw[] = $arLinkNew;
	    }
	}
	if(empty($arLinksIDsRaw)){
		$pageExist = false;
		return false;
	}
	$arLinksIDs = array();
	foreach ($arLinksIDsRaw as $key => $value) {
		$id = preg_replace('/\.html|\.php/', '', $value["link"]);
		$arValue = explode('/', $id);
		$id = array_pop($arValue);
		$arLinksIDs[$id] = array(
			"title" => $value["title"],
			"link" => $value["link"],
			"active" => $value["active"],
			"address_id" => ($did == 291704) ? ADDRESS_1 : ADDRESS_2,
		);
	}

	$resLinksIDs = array_replace($resLinksIDs, $arLinksIDs);

	sleep(3);
}

// Парсим общие страницы
$page = 1;
$pageExist = true;
$resLinksIDs = array();

while ($pageExist) {
	parsePage(291704, $page, $resLinksIDs, $pageExist);
	$page++;
}

$page = 1;
$pageExist = true;
while ($pageExist) {
	parsePage(181152, $page, $resLinksIDs, $pageExist);
	$page++;
}

$resLinksIDsList = array_keys($resLinksIDs);

// для id которых нет в битре - добавить
$arBitrixIDs = array();
$arFilter = Array("IBLOCK_ID" => 1);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, Array());
while($ob = $res->GetNextElement()){
	$arFields = $ob->GetFields();
	$arBitrixIDs[$arFields["ID"]] = (int)$arFields["CODE"];
}
$diffIDs = array_diff($resLinksIDsList, $arBitrixIDs);

$IDsForLogs = array();
foreach ($diffIDs as $value) {
	$el = new CIBlockElement;

	$PROP = array();
	$PROP["LINK_DROM"] = $resLinksIDs[$value]["link"];
	$PROP["ADDRESS"] = $resLinksIDs[$value]["address_id"];

	$arLoadProductArray = Array(
	  "MODIFIED_BY"    => $USER->GetID(),
	  "IBLOCK_SECTION_ID" => false,
	  "IBLOCK_ID"      => 1,
	  "NAME"           => $resLinksIDs[$value]["title"],
	  "CODE"		   => $value,
	  "PROPERTY_VALUES"=> $PROP,
	  "ACTIVE"         => ($resLinksIDs[$value]["active"]) ? "Y" : "N"
	);

	if($PRODUCT_ID = $el->Add($arLoadProductArray)){
		$IDsForLogs[] = $PRODUCT_ID;
	}else{
		writeLog("Ошибка! ".$el->LAST_ERROR, "parser");
	}
}
if($IDsForLogs){
	writeLog("Элементы добавлены. IDs: ".implode(",", $IDsForLogs), "parser");
}

// для id которые есть в битре, но не пришли - деактивировать
$IDsDeactivate = array_diff($arBitrixIDs, $resLinksIDsList);
if($IDsDeactivate){
	$bitrixIDsDeactivate = array();
	foreach ($IDsDeactivate as $key => $value) {
		$el = new CIBlockElement;
		$arLoadProductArray = Array("ACTIVE" => "N");
		$res = $el->Update($key, $arLoadProductArray);
		$bitrixIDsDeactivate[] = $key;
	}
	writeLog("Элементы деактивированы. IDs: ".implode(",", $bitrixIDsDeactivate), "parser");
}

//сравнить состояние элемента в битре и нового
//получить все элементы в битре (записать массив с их состоянием)
$arBitrixIDs = array();
$arFilter = Array("IBLOCK_ID" => 1);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, Array());
while($ob = $res->GetNextElement()){
	$arFields = $ob->GetFields();
	$arBitrixIDs[$arFields["CODE"]] = array(
		"id" => $arFields["ID"],
		"active" => $arFields["ACTIVE"]
	);
}

//сравнить
$IDsActiveChange = array();
foreach ($resLinksIDs as $key => $value) {
	$active = ($value["active"]) ? "Y" : "N";
	if($arBitrixIDs[$key]["active"] != $active){
		$IDsActiveChange[$arBitrixIDs[$key]["id"]] = $active;
	}
}

//деактивировать
$bitrixIDsActiveChange = array();
if($IDsActiveChange){
	foreach ($IDsActiveChange as $key => $value) {
		$el = new CIBlockElement;
		$arLoadProductArray = Array("ACTIVE" => $value);
		$res = $el->Update($key, $arLoadProductArray);
		$bitrixIDsActiveChange[] = $key;
	}
	writeLog("Элементы изменили статус активности. IDs: ".implode(",", $bitrixIDsActiveChange), "parser");
}

// //если есть элементы которые не активны, но пришли - активируем их
// $arBitrixIDs = array();
// $arFilter = Array("IBLOCK_ID" => 1, "ACTIVE" => "N");
// $res = CIBlockElement::GetList(Array(), $arFilter, false, false, Array());
// while($ob = $res->GetNextElement()){
// 	$arFields = $ob->GetFields();
// 	$arBitrixIDs[$arFields["ID"]] = (int)$arFields["CODE"];
// }
// $IDsActivate = array_intersect($arBitrixIDs, $resLinksIDsList);
// if($IDsActivate){
// 	$bitrixIDsActivate = array();
// 	foreach ($IDsActivate as $key => $value) {
// 		$el = new CIBlockElement;
// 		$arLoadProductArray = Array("ACTIVE" => "Y");
// 		$res = $el->Update($key, $arLoadProductArray);
// 		$bitrixIDsActivate[] = $key;
// 	}
// 	writeLog("Элементы активированы. IDs: ".implode(",", $bitrixIDsActivate), "parser");
// }

?>