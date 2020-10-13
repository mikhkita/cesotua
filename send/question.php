<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if (!empty($_POST['MAIL'])){
    die('1');
}

$text .= "Форма 'Задать вопрос'\n";
$text .= "<b>Имя:</b> " . $_POST['name'] . "\n";
$text .= "<b>Телефон:</b> " . $_POST['phone'] . "\n";
$text .= "<b>Вопрос:</b> " . $_POST['question'] . "\n";

sendMessage($text);

die('1');

?>