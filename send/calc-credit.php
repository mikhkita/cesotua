<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if (!empty($_POST['MAIL'])){
    die('1');
}

if(!CModule::IncludeModule("iblock")){
    die('1');
}

$bank_db = CIBlockElement::GetByID($_POST["bank"]);
if (!($bank = $bank_db->GetNext())){
    die('1');
}

$text .= "Рассчёт кредита\n";
$text .= "<b>Имя:</b> " . $_POST['name'] . "\n";
$text .= "<b>Телефон:</b> " . $_POST['phone'] . "\n";
$text .= "<b>Автомобиль:</b> " . $_POST['autoName'] . "\n";
$text .= "<b>Стоимость автомобиля:</b> " . $_POST['autoPrice'] . " р. \n";
$text .= "<b>Первоначальный взнос:</b> " . $_POST['sum'] . " р. \n";
$text .= "<b>Срок:</b> " . $_POST['loan-term'] . " " . declOfNum($_POST['loan-term'], ["месяц", "месяца", "месяцев"]). "\n";
$text .= "<b>Банк:</b> " . $bank['NAME'] . " (ставка " . $bank['CODE'] . "%) \n";
$text .= "<b>Ежемесячный платеж:</b> " . $_POST['monthlyPayment'] . " р.\n";

sendMessage($text);

die('1');

?>