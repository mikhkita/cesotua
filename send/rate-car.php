<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

    CModule::IncludeModule("iblock");
    $el = new CIBlockElement;

    $PROP = array();
    $arFile = array();

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
        
        $text .= "Заявка на оценку автомобиля\n";
        $text .= "<b>Имя:</b> " . $_POST['name'] . "\n";
        $text .= "<b>Телефон:</b> " . $_POST['phone'] . "\n";
        $text .= "<b>Автомобиль:</b> " . $_POST['mark'] . " " . $_POST['model'] . "\n";
        $text .= "<b>Подробнее:</b> http://".$_SERVER["HTTP_HOST"]."/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=3&type=content&ID=" . $id . "\n";

        sendMessage($text);

        die('1');
    } else {
        die('0');
    }
?>