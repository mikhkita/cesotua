<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>

<?
CModule::IncludeModule("iblock");

$propsList = array(
	array(
		"NAME" => "Двигатель",
		"PROP" => "ENGINE"
	),
	array(
		"NAME" => "Мощность",
		"PROP" => "CAPACITY"
	),
	array(
		"NAME" => "Объем",
		"PROP" => "VOLUME"
	),
	array(
		"NAME" => "Трансмиссия",
		"PROP" => "TRANSMISSION"
	),
	array(
		"NAME" => "Привод",
		"PROP" => "DRIVE"
	),
	array(
		"NAME" => "Тип кузова",
		"PROP" => "BODY"
	),
	array(
		"NAME" => "Цвет",
		"PROP" => "COLOR"
	),
	array(
		"NAME" => "Пробег, км",
		"PROP" => "MILEAGE"
	),
	array(
		"NAME" => "Руль",
		"PROP" => "RUDDER"
	),
	array(
		"NAME" => "Поколение",
		"PROP" => "GEN"
	),
	array(
		"NAME" => "Комплектация",
		"PROP" => "EQUIPMENT"
	)
);

function getPropName($field){
	global $propsList;
	$field = str_replace(":", "", $field);
	foreach ($propsList as $key => $value) {
		if($value["NAME"] == $field){
			return $value["PROP"];
		}
	}
	return false;
}

function getPropID($name, $arEnum){
	foreach ($arEnum as $key => $value) {
		if($value == $name){
			return $key;
		}
	}
	return "";
}

//получить значения свойств

//Марка
$arMarksEnum = array();
$property_enums = CIBlockPropertyEnum::GetList(Array("ID"=>"ASC"), Array("IBLOCK_ID"=>1, "CODE"=>"MARK"));
while($enum_fields = $property_enums->GetNext()){
	$arMarksEnum[$enum_fields["ID"]] = $enum_fields["VALUE"];
}

//КПП
$arTransEnum = array();
$property_enums = CIBlockPropertyEnum::GetList(Array("ID"=>"ASC"), Array("IBLOCK_ID"=>1, "CODE"=>"TRANSMISSION"));
while($enum_fields = $property_enums->GetNext()){
	$arTransEnum[$enum_fields["ID"]] = $enum_fields["VALUE"];
}

//Привод
$arDriveEnum = array();
$property_enums = CIBlockPropertyEnum::GetList(Array("ID"=>"ASC"), Array("IBLOCK_ID"=>1, "CODE"=>"DRIVE"));
while($enum_fields = $property_enums->GetNext()){
	$arDriveEnum[$enum_fields["ID"]] = $enum_fields["VALUE"];
}

//Руль
$arRudderEnum = array();
$property_enums = CIBlockPropertyEnum::GetList(Array("ID"=>"ASC"), Array("IBLOCK_ID"=>1, "CODE"=>"RUDDER"));
while($enum_fields = $property_enums->GetNext()){
	$arRudderEnum[$enum_fields["ID"]] = $enum_fields["VALUE"];
}

//Тип кузова
$arBodyEnum = array();
$property_enums = CIBlockPropertyEnum::GetList(Array("ID"=>"ASC"), Array("IBLOCK_ID"=>1, "CODE"=>"BODY"));
while($enum_fields = $property_enums->GetNext()){
	$arBodyEnum[$enum_fields["ID"]] = $enum_fields["VALUE"];
}

//Двигатель
$arEngineEnum = array();
$property_enums = CIBlockPropertyEnum::GetList(Array("ID"=>"ASC"), Array("IBLOCK_ID"=>1, "CODE"=>"ENGINE"));
while($enum_fields = $property_enums->GetNext()){
	$arEngineEnum[$enum_fields["ID"]] = $enum_fields["VALUE"];
}

//получить самый старый элемент (по кастомному полю с датой)
$arFilter = Array("IBLOCK_ID" => 1, "ACTIVE" => "Y");
if(isset($_GET["id"]) && !empty($_GET["id"])){
	$arFilter["ID"] = $_GET["id"];
}
$res = CIBlockElement::GetList(Array("PROPERTY_DATE_CHANGE" => "ASC", "ID" => "ASC"), $arFilter, false, array("nPageSize" => "1"), Array());
if($ob = $res->GetNextElement()){
	$arFields = $ob->GetFields();
	$arProps = $ob->GetProperties();
	//$arFields["CODE"];
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $arProps["LINK_DROM"]["VALUE"]);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);

	$html = curl_exec($ch);
	$html = preg_replace('/<style.*?>.*?<\/style>/is', '', $html);
	$html = preg_replace('/<script.*?>.*?<\/script>/is', '', $html);
	//echo $html;
	// $isWinCharset = mb_check_encoding($html, "windows-1251");
	// if ($isWinCharset) {
	//     $html = iconv("windows-1251", "utf-8", $html);
	// }
	curl_close($ch);

	$dom = new DOMDocument;
	$dom->loadHTML('<?xml encoding="utf-8" ?>'.$html);
	$dom->saveHTML();
	$xpath = new DOMXpath($dom);	

	$PROPS = array();
	//сохраним инфу, чтоб не перетереть
	$PROPS["LINK_DROM"] = $arProps["LINK_DROM"]["VALUE"];
	$PROPS["VIN"] = $arProps["VIN"]["VALUE"];
	$PROPS["STEALINGS"] = $arProps["STEALINGS"]["VALUE"];
	$PROPS["RESTRICTIONS"] = $arProps["RESTRICTIONS"]["VALUE"];
	$PROPS["OWNERSHIP"] = $arProps["OWNERSHIP"]["~VALUE"];
	$PROPS["ADDRESS"] = $arProps["ADDRESS"]["VALUE"];
	$PROPS["PARSE"] = 154;

	$spans = $dom->getElementsByTagName('span');
	$autoDescription = false;
	for ($i = 0; $i < $spans->length; $i++) {
		$span = $spans->item($i);
	    if($span->getAttribute('data-section') == 'auto-description'){
	    	$autoDescription = true;
	    	$divs = $span->getElementsByTagName('div');
	    	for ($j = 0; $j < $divs->length; $j++) {
	    		$div = $divs->item($j);
	    		if($div->getAttribute('class') == 'b-media-cont_margin_b-size-xxs'){
	    			$propValueArray = array();

	    			// Получить название поля
	    			$fieldName = $div->getElementsByTagName('span')->item(0);
	    			$propName = getPropName($fieldName->textContent);
	    			$propValue = "";

	    			if($propName == "CAPACITY"){
	    				$divsCatacity = $div->getElementsByTagName('div');
	    				for ($k = 0; $k < $divsCatacity->length; $k++) {
	    					$catacity = $divsCatacity->item($k);
	    					if($catacity->getAttribute('class') == 'b-triggers__text'){
	    						$propValue = str_replace("л.с.", "", $catacity->textContent);
	    						$string = htmlentities($propValue, null, 'utf-8');
								$propValue = str_replace("&nbsp;", "", $string);
								$propValue = html_entity_decode($propValue);
	    					}
	    				}
	    			}elseif($propName == "GEN" || $propName == "EQUIPMENT"){
	    				$aList = $div->getElementsByTagName('a');
	    				for ($k = 0; $k < $aList->length; $k++) {
	    					$aItem = $aList->item($k);
	    					$propValue = $aItem->textContent;
	    				}
	    			}else{
	    				$childs = $div->childNodes;
	    				for ($k = 0; $k < $childs->length; $k++) {
		    				$child = $childs->item($k);
		    				if($child->nodeName == "#text"){
		    					$propValueArray = array();
		    					$propValue = $child->textContent;
		    					if($propName == "ENGINE"){
		    						$propValue = explode(",", $propValue);
		    						$propValueArray = array(
		    							"ENGINE" => $propValue[0],
		    							"VOLUME" => str_replace("л", "", $propValue[1])
		    						);
		    					}
		    					if($propName == "BODY"){
		    						$propValue = mb_strtolower(str_replace(".", "", $propValue));
		    					}
		    				}
		    			}
	    			}
	    			if($propValueArray){
	    				foreach ($propValueArray as $key => $value) {
	    					$PROPS[$key] = trim($value);
	    				}
	    			}else{
	    				$PROPS[$propName] = trim($propValue);
	    			}

	    			if(!$propName){
	    				writeLog("Ошибка! Свойство не найдено. Имя свойства с дрома: ".$fieldName->textContent, "parserDetail");
	    			}
	    			if(!$propValue){
	    				writeLog("Ошибка! Значение свойства пустое.", "parserDetail");
	    			}
	    		}
	    	}
	    }
	}
	if(!$autoDescription){ // если этот контейнер не пришёл, то берём инфу из другого контейнера
		$tables = $dom->getElementsByTagName('table');
		// $tablesDescription = false;
		$table = $tables->item(0);
		if($table){	
			$trList = $table->getElementsByTagName('tr');
			if($trList){
		    	for ($j = 0; $j < $trList->length; $j++) {
		    		$tr = $trList->item($j);
		    		if($tr->getAttribute('class') != ''){

						// Получить название поля
						$fieldName = $tr->getElementsByTagName('th')->item(0);
						// $fieldValue = $tr->getElementsByTagName('span')->item(0);
						$propName = getPropName($fieldName->textContent);
						$propValue = "";
						$propValueArray = array();
						switch ($propName) {
							case "ENGINE":
								$propValue = $tr->getElementsByTagName('span')->item(0)->textContent;
								$propValue = explode(",", $propValue);
								$propValueArray = array(
									"ENGINE" => $propValue[0],
									"VOLUME" => str_replace("л", "", $propValue[1])
								);
								break;
							case "CAPACITY":
								$propValue = str_replace("л.с.", "", $tr->getElementsByTagName('a')->item(0)->textContent);
								$string = htmlentities($propValue, null, 'utf-8');
								$propValue = str_replace("&nbsp;", "", $string);
								$propValue = html_entity_decode($propValue);
								break;
							case "VOLUME":
								$propValue = $tr->getElementsByTagName('td')->item(0)->textContent;
								break;
							case "TRANSMISSION":
								$propValue = $tr->getElementsByTagName('td')->item(0)->textContent;
								break;
							case "DRIVE":
								$propValue = $tr->getElementsByTagName('td')->item(0)->textContent;
								break;
							case "BODY":
								$propValue = $tr->getElementsByTagName('td')->item(0)->textContent;
								break;
							case "COLOR":
								$propValue = $tr->getElementsByTagName('td')->item(0)->textContent;
								break;
							case "MILEAGE":
								$propValue = $tr->getElementsByTagName('td')->item(0)->textContent;
								break;
							case "RUDDER":
								$propValue = $tr->getElementsByTagName('td')->item(0)->textContent;
								break;
							case "GEN":
								$propValue = $tr->getElementsByTagName('a')->item(0)->textContent;
								break;
							case "EQUIPMENT":
								$propValue = $tr->getElementsByTagName('a')->item(0)->textContent;
								break;
							
							default:
								# code...
								break;
						}
						if($propValueArray){
							foreach ($propValueArray as $key => $value) {
								$PROPS[$key] = trim($value);
							}
						}else{
							$PROPS[$propName] = trim($propValue);
						}
					}
					
		    	}
		    }
		}
	}

	// Получить инфу по vin-номеру

	// // Количество владельцев
	// $elements = $xpath->query("//*[@data-app-root='car-report']/div[1]/div[4]/div[1]/div[1]/span[1]");
	// foreach ($elements as $el) {
	// 	$PROPS["OWNERSHIP"] = $el->nodeValue;
	// }
	// // Розыск
	// $elements = $xpath->query("//*[@data-app-root='car-report']/div[1]/div[5]/div[1]");
	// foreach ($elements as $el) {
	// 	$PROPS["STEALINGS"] = $el->nodeValue;
	// }
	// // Ограничения
	// $elements = $xpath->query("//*[@data-app-root='car-report']/div[1]/div[6]/div[1]");
	// foreach ($elements as $el) {
	// 	$PROPS["RESTRICTIONS"] = $el->nodeValue;
	// }
	
	// Получить цену
	$elements = $xpath->query("//*[@data-app-root='bull-price']/div[1]/div[1]");
	if($elements->length == 0){
		$checkSold = $xpath->query("//*[@data-app-root='bull-page']/div[4]/div[1]/div[1]/div[3]");
		if($checkSold->length == 0){
			$elements = $xpath->query("//*[@data-app-root='bull-page']/div[4]/div[1]/div[1]/div[2]/div[2]/div[1]/div[1]");
		}else{
			$elements = $xpath->query("//*[@data-app-root='bull-page']/div[4]/div[1]/div[1]/div[3]/div[2]/div[1]/div[1]");
		}
	}
	foreach ($elements as $el) {
		$PROPS["PRICE"] = trim(preg_replace("/[^0-9]/", '', $el->nodeValue));
	}
	// Получить год
	$elements = $xpath->query("//h1");
	foreach ($elements as $el) {
		$elArray = explode(",", $el->nodeValue);
		$elArray = explode("год", $elArray[1]);
		$PROPS["YEAR"] = trim($elArray[0]);
	}
	// Получить марку
	//$PROPS["MARK"] = explode("/", preg_replace("/(http:\/\/|https:\/\/)/", '', $arProps["LINK_DROM"]["VALUE"]))[1];
	$elements = $xpath->query("//*[@data-ftid='header_breadcrumb']/div[3]/a/span");
	foreach ($elements as $el) {
		$val = trim($el->nodeValue);
		$PROPS["MARK"] = ($val == "Лада") ? "LADA" : $val;
	}

	// Обновить дату изменения
	$PROPS["DATE_CHANGE"] = date("Y-m-d H:i:s");

	//заменить значения на id из битрикса
	$PROPS["MARK"] = getPropID($PROPS["MARK"], $arMarksEnum);
	$PROPS["TRANSMISSION"] = getPropID($PROPS["TRANSMISSION"], $arTransEnum);
	$PROPS["DRIVE"] = getPropID($PROPS["DRIVE"], $arDriveEnum);
	$PROPS["RUDDER"] = getPropID($PROPS["RUDDER"], $arRudderEnum);
	$PROPS["BODY"] = getPropID($PROPS["BODY"], $arBodyEnum);
	$PROPS["ENGINE"] = getPropID($PROPS["ENGINE"], $arEngineEnum);

	//Получить текущие фотки для сравнения с новыми
	$photoCurrentIDs = array_diff($arProps["PHOTOS"]["DESCRIPTION"], array(''));
	$photoCurrentIDsString = implode("", $photoCurrentIDs);

	// $connectValueDescr = array();
	// foreach (array_diff($arProps["PHOTOS"]["DESCRIPTION"], array('')) as $key => $value) {
	// 	$connectValueDescr[$value] = $arProps["PHOTOS"]["VALUE"][$key];
	// }

	//Достаём фотки
	$arPhoto = array();
	$photoNewInfo = array();
	$elements = $xpath->query("//*[@class='b-advItemGallery__thumbs']/div/a");
	if($elements->length == 0){
		$elements = $xpath->query("//*[@data-ftid='bull-page_bull-gallery_thumbnails']//img");
		foreach ($elements as $el) {
			$attributes = $el->attributes;
			foreach ($attributes as $attr) {
				if($attr->name == "src"){
					$src = $attr->value;
					$srcArray = explode("gen", $src);
					if(count($srcArray) > 1){
						$srcArrayLeft = $srcArray[0];
						$srcArrayRight = $srcArray[1];
						$srcArray = explode("_", $srcArrayRight);
						$srcArrayRightLeft = $srcArray[0];
						$srcArrayRightRight = $srcArray[1];
						$srcArray = explode(".", $srcArrayRightRight);
						$srcID = $srcArray[0];
						$photoNewInfo[$srcID] = $srcArrayLeft."gen1200_".$srcArrayRightRight;
					}
				}
			}
		}
	}else{
		foreach ($elements as $el) {
			$attributes = $el->attributes;
			foreach ($attributes as $attr) {
				if($attr->name == "href"){
					$href = $attr->value;
					//получить id фото
					$hrefArray = explode("/", $href);
					$hrefID = array_pop($hrefArray);
					$hrefArray = explode(".", $hrefID);
					$hrefID = $hrefArray[0];
					$hrefArray = explode("_", $hrefID);
					$hrefID = array_pop($hrefArray);
					$photoNewInfo[$hrefID] = $href;
				}
			}
		}
	}

	if($photoNewInfo){
		// для машин на Ломоносова поменять местами 1 и 2 фотки
		// if($PROPS["ADDRESS"] == ADDRESS_2){
		// 	$keys = array_keys($photoNewInfo);
		// 	$firstKey = $keys[0];
		// 	$firstEl = array_shift($photoNewInfo);
		// 	$secondKey = $keys[1];
		// 	$secondEl = array_shift($photoNewInfo);

		// 	$arSwap[$secondKey] = $secondEl;
		// 	$arSwap[$firstKey] = $firstEl;

		// 	$photoNewInfo = array_merge($arSwap, $photoNewInfo);
		// }

		//Поставить основную фотку в начало
		$mainPhoto = $xpath->query("//*[@data-ftid='bull-page_bull-gallery_main-photo']//img");
		if($mainPhoto->length > 0){
			foreach ($mainPhoto as $photo) {
				$attributes = $photo->attributes;
				foreach ($attributes as $attr) {
					if($attr->name == "src"){
						$href = $attr->value;
						//получить id фото
						$hrefArray = explode("/", $href);
						$hrefID = array_pop($hrefArray);
						$hrefArray = explode(".", $hrefID);
						$hrefID = $hrefArray[0];
						$hrefArray = explode("_", $hrefID);
						$hrefID = array_pop($hrefArray);
						$mainID = $hrefID;
						if(isset($photoNewInfo[$mainID])){
							$mainValue = $photoNewInfo[$mainID];
							unset($photoNewInfo[$mainID]);
							$photoNewInfo = array($mainID => $mainValue) + $photoNewInfo;
						}
					}
				}
			}
		}

		$photoNewIDs = array_keys($photoNewInfo);
		$photoNewIDsString = implode("", $photoNewIDs);

		//проверить совпадают ли новые и старые фотки
		$match = true;
		
		if($photoCurrentIDsString == $photoNewIDsString){
			foreach ($photoNewIDs as $value) {
				if(empty($photoCurrentIDs) || !in_array($value, $photoCurrentIDs)){
					$match = false;
					break;
				}
			}
		}else{
			$match = false;
		}

		if(!$match){
			//удалить все старые фото
			CIBlockElement::SetPropertyValuesEx($arFields["ID"], $arFields["IBLOCK_ID"], array(
				"PHOTOS" => Array("VALUE" => array("del" => "Y"))
			));
			//добавить новые фото
			foreach ($photoNewInfo as $hrefID => $href) {
				$currentPhoto = CFile::MakeFileArray($href);
				$currentPhoto["name"] = $arFields["CODE"];
				$arPhoto[] = array(
				   'VALUE' => $currentPhoto,
				   'DESCRIPTION' => $hrefID
				);
			}
			$PROPS["PHOTOS"] = $arPhoto;
		}
	}else{
		CIBlockElement::SetPropertyValuesEx($arFields["ID"], $arFields["IBLOCK_ID"], array(
			"PHOTOS" => Array("VALUE" => array("del" => "Y"))
		));
	}

	// Дополнительные параметры

	$elements = $xpath->query("//*[@data-section='auto-description']/p[1]");
	if($elements->length == 0){
		$elements = $xpath->query("//*[@data-ga-stats-name='gibdd_report']/following-sibling::*[1]/div[1]/span[2]");
	}
	$res = "";
	foreach ($elements as $el) {
		echo "!!!!!!!!";
		$text = $el->nodeValue;
		if($arProps["ADDRESS"]["VALUE"] == ADDRESS_1){// на основной странице (Ивановского)
			$arText = explode("В автосалоне действует следующий ряд программ", $text);
			if(count($arText) > 1){
				$arText = $arText[0];
				$text = strstr($arText, '•');
			}
		}else{// на второй странице
			$text = strstr($text, '•');
			$arText = explode('ДОПОЛНИТЕЛЬНОЕ ОБОРУДОВАНИЕ', $text);
			if(count($arText) > 1){
				$text = $arText[0];
			}else{
				// ищем последнее вхождение точки
				$pos = strrpos($text, '•');
				if($pos !== false){
					$text = substr($text, 0, $pos);
				}
			}
		}
		$arItems = explode('•', $text);
		$arItems = array_diff($arItems, array(''));
		if(count($arItems) > 1){
			foreach ($arItems as $key => $value) {
				if(trim($value)){
					$arItems[$key] = "<li>".trim($value)."</li>";
				}
			}
			$res = "<ul>".implode("", $arItems)."</ul>";
		}
	}

	// Записать свойства
	CIBlockElement::SetPropertyValues($arFields["ID"], $arFields["IBLOCK_ID"], $PROPS);

	$arLoadProductArray = Array(
		"PREVIEW_TEXT" => $res,
		"PREVIEW_TEXT_TYPE" => "html"
	);
	$el = new CIBlockElement;
	$res = $el->Update($arFields["ID"], $arLoadProductArray);
	if(!$res){
		writeLog("Ошибка! Не удалось обновить PREVIEW_TEXT. ID = ".$arFields["ID"], "parserDetail");
	}
	$textPhoto = isset($PROPS["PHOTOS"]) ? ". Фото обновлены" : "";
	writeLog("Обновлён элемент. ID = ".$arFields["ID"].$textPhoto, "parserDetail");
	echo "ID = ".$arFields["ID"];
	echo ", autoDescription = ".$autoDescription;
	print_r($PROPS);
}


?>