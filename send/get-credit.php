<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if (!empty($_POST['MAIL'])){
    die('1');
}

$text .= "Заявка на кредит\n";
$text .= "<b>Имя:</b> " . $_POST['name'] . "\n";
$text .= "<b>Телефон:</b> " . $_POST['phone'] . "\n";
$text .= "<b>Автомобиль:</b> " . $_POST['mark'] . " " . $_POST['model'] . "\n";
$text .= "<b>Комментарий:</b> " . $_POST["description"] . "\n";

sendMessage($text);

die('1');

?>