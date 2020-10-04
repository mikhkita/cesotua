<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if (!empty($_POST['MAIL'])){
    die('1');
}

if(!CModule::IncludeModule("iblock")){
    die('1');
}

$auto_db = CIBlockElement::GetByID($_POST["autoID"]);
if (!($auto = $auto_db->GetNext())){
    die('1');
}

$text =  isset($_POST['specify']) ?  "Уточнить цену\n" : "Осмотр автомобиля\n";

if (!empty($_POST['name'])){
    $text .= "<b>Имя:</b> " . $_POST['name'] . "\n";
}

$text .= "<b>Телефон:</b> " . $_POST['phone'] . "\n";
$text .= "<b>Автомобиль:</b> " . $auto['NAME'] . "\n";
$text .= "<b>Ссылка на авто:</b> http://".$_SERVER["HTTP_HOST"]."/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=1&type=content&ID=" . $auto['ID'] . "\n";

sendMessage($text);

die('1');

?>