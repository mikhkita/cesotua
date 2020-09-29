<?
    if (array_key_exists('is_ajax', $_REQUEST) && $_REQUEST['is_ajax']=='Y') {
        $APPLICATION->RestartBuffer();
    }
?>