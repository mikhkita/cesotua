<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule("iblock");
$el = new CIBlockElement;

$PROP = array();
$arFile = array();

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

    if (!empty($_POST['attachment'])){
        foreach ($_POST['attachment'] as $key => $value) {
            array_push($arFile, array(
                "VALUE" => CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"].'/upload/tmp/'.$value),
                "DESCRIPTION" => " ",
            ));
        }
    }

    $previewText = 'Имя: ' . $_POST['name'] . PHP_EOL;
    $previewText .= 'Телефон: ' . $_POST['phone'] . PHP_EOL;
    $previewText .= 'Описание: ' . $_POST['description'];

    $PROP["PHOTOS"] = $arFile;

    $arLoadProductArray = Array(
        "IBLOCK_ID"        => 3,
        "PROPERTY_VALUES"  => $PROP,
        "NAME"             => $_POST['mark']. ' ' . $_POST['model'],
        "ACTIVE"           => "Y",
        "PREVIEW_TEXT"     => $previewText,
        "DATE_ACTIVE_FROM" => ConvertTimeStamp(time(), "FULL")
    );

    if ($id = $el->Add($arLoadProductArray)){

        $arEventFields = array(
            "NAME"  => $_POST["name"],
            "PHONE" => $_POST["phone"],
            "AUTO"  => $_POST['mark'] . " " . $_POST['model'],
            "LINK" => "https://".$_SERVER["HTTP_HOST"]."/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=3&type=content&ID=" . $id
        );

        if(CEvent::Send("RATE_CAR", "s1", $arEventFields)){
            echo "1";
        }else{
            echo "0";
        }
        
        $text .= "Заявка на оценку автомобиля\n";
        $text .= "<b>Имя:</b> " . $_POST['name'] . "\n";
        $text .= "<b>Телефон:</b> " . $_POST['phone'] . "\n";
        $text .= "<b>Автомобиль:</b> " . $_POST['mark'] . " " . $_POST['model'] . "\n";
        $text .= "<b>Подробнее:</b> https://".$_SERVER["HTTP_HOST"]."/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=3&type=content&ID=" . $id . "\n";

        sendMessage($text);

    } else {
        echo "0";
    }
}

?>