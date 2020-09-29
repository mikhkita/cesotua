<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>

<?
$db_props = CIBlockElement::GetProperty(1, 150, Array(), Array("CODE"=>"OWNERSHIP"));
if($ar_props = $db_props->Fetch()){
	print_r($ar_props);
	$value = $ar_props["VALUE"];
	echo $value."====";
	print_r(json_decode(htmlspecialchars_decode($value), true));
}

?>