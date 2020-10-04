<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if (!empty($_POST['MAIL'])){
    die('1');
}

$text .= "Подбор автомобиля\n";

if (!empty($_POST['name'])){
    $text .= "<b>Имя:</b> " . $_POST['name'] . "\n";
}

$text .= "<b>Телефон:</b> " . $_POST['phone'] . "\n";
$text .= "<b>Автомобиль:</b> " . $_POST['auto'] . "\n";

sendMessage($text);

die('1');

?>