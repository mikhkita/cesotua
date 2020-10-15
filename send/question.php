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
		"QUESTION"	=> $_POST['question']
	);

	if(CEvent::Send("QUESTION", "s1", $arEventFields)){
		echo "1";
	}else{
		echo "0";
	}

	$text .= "Форма 'Задать вопрос'\n";
	$text .= "<b>Имя:</b> " . $_POST['name'] . "\n";
	$text .= "<b>Телефон:</b> " . $_POST['phone'] . "\n";
	$text .= "<b>Вопрос:</b> " . $_POST['question'] . "\n";

	sendMessage($text);

}

?>