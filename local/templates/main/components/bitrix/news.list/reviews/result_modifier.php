<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

foreach ($arResult["ITEMS"] as $i => $arItem){
	$arFilter = Array("IBLOCK_ID" => 6, "ACTIVE" => "Y", "ID" => $arItem["PROPERTIES"]["SERVICE"]["VALUE"]);
	$res = CIBlockElement::GetList(Array(), $arFilter, false, false, Array());
	if($ob = $res->GetNextElement()){
		$arFields = $ob->GetFields();
		$arProps = $ob->GetProperties();
		$arResult["ITEMS"][$i]["SERVICE_INFO"]["DETAIL_PAGE_URL"] = $arFields["DETAIL_PAGE_URL"];
		$arResult["ITEMS"][$i]["SERVICE_INFO"]["NAME"] = ($arProps["TITLE_MENU"]["VALUE"]) ? $arProps["TITLE_MENU"]["VALUE"] : $arFields["NAME"];
	}
}

?>