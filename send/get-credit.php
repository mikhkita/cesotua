<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

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
		"AUTO"	=> $_POST['mark'] . " " . $_POST['model'],
		"COMMENT" => $_POST["description"]
	);

	if(CEvent::Send("GET_CREDIT", "s1", $arEventFields)){
		echo "1";
	}else{
		echo "0";
	}

	$text .= "Заявка на кредит\n";
	$text .= "<b>Имя:</b> " . $_POST['name'] . "\n";
	$text .= "<b>Телефон:</b> " . $_POST['phone'] . "\n";
	$text .= "<b>Автомобиль:</b> " . $_POST['mark'] . " " . $_POST['model'] . "\n";
	$text .= "<b>Комментарий:</b> " . $_POST["description"] . "\n";

	sendMessage($text);

}

?>