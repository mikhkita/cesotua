<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if(!CModule::IncludeModule("iblock")){
    die('0');
}

$bank_db = CIBlockElement::GetByID($_POST["bank"]);
if (!($bank = $bank_db->GetNext())){
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
		"NAME"	=> $_POST["name"],
		"PHONE" => $_POST["phone"],
		"AUTO" => $_POST['autoName'],
		"PRICE"	=> $_POST['autoPrice'] . " р.",
		"SUM" => $_POST['sum'] . " р.",
		"TERM" => $_POST['loan-term'] . " " . declOfNum($_POST['loan-term'], ["месяц", "месяца", "месяцев"]),
		"BANK" => $bank['NAME'] . " (ставка " . $bank['CODE'] . "%)",
		"PAYMENT" => $_POST['monthlyPayment'] . " р."
	);

	if(CEvent::Send("CALC_CREDIT", "s1", $arEventFields)){
		echo "1";
	}else{
		echo "0";
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
	if(isset($_POST["addressID"]) && !empty($_POST["addressID"])){
		$chat = (($_POST["addressID"] == ADDRESS_1) ? CHAT_I : CHAT_L);
		sendMessage($text, $chat);
	}
}


?>