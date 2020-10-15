<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if(!CModule::IncludeModule("iblock")){
    die('0');
}

$auto_db = CIBlockElement::GetByID($_POST["autoID"]);
if (!($auto = $auto_db->GetNext())){
    die('0');
}

$filterTags = array(
	"http://128.fo.ru",
	"КЛИЕНТСКИЕ БАЗЫ",
	"prodawez392@gmail.com",
);

$spam = false;
foreach ($_POST as $i => $value)
	foreach ($filterTags as $j => $tag)
		if( mb_strpos($value, $tag, 0, "UTF-8") !== false )
			$spam = true;

if( (isset($_POST["MAIL"]) && $_POST["MAIL"] != "") || $spam ){
	echo "1";
}else{

	$arEventFields = array(
		"HEAD" => isset($_POST['specify']) ?  "Уточнить цену" : "Осмотр автомобиля",
		"NAME"	=> $_POST["name"],
		"PHONE" => $_POST["phone"],
		"AUTO" => $auto['NAME'],
		"LINK"	=> "https://".$_SERVER["HTTP_HOST"]."/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=1&type=content&ID=" . $auto['ID']
	);

	if(CEvent::Send("INSPECTION", "s1", $arEventFields)){
		echo "1";
	}else{
		echo "0";
	}

	$text =  isset($_POST['specify']) ?  "Уточнить цену\n" : "Осмотр автомобиля\n";

	if (!empty($_POST['name'])){
	    $text .= "<b>Имя:</b> " . $_POST['name'] . "\n";
	}

	$text .= "<b>Телефон:</b> " . $_POST['phone'] . "\n";
	$text .= "<b>Автомобиль:</b> " . $auto['NAME'] . "\n";
	$text .= "<b>Ссылка на авто:</b> https://".$_SERVER["HTTP_HOST"]."/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=1&type=content&ID=" . $auto['ID'] . "\n";

	sendMessage($text);
	if(isset($_POST["addressID"]) && !empty($_POST["addressID"])){
		$chat = (($_POST["addressID"] == ADDRESS_1) ? CHAT_I : CHAT_L);
		sendMessage($text, $chat);
	}

}

?>