<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>

<?

// генерация нового отчета
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://b2bapi.avtocod.ru/b2b/api/v1/dev/user/reports/default/_make");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'Content-Type: application/json',
	'Authorization: AR-REST ZGVmYXVsdEB0ZXN0OjE0ODMyMjg4MDA6MTU3NjgwMDAwOnVjQk9kOGZhc3hIMkR3bVgrOHhhcVE9PQ=='
));
$request = json_encode(array(
	"queryType" => "VIN",
	"query" => "Z94CB41AAGR323020"
));
curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);

$jsonMakeResult = curl_exec($ch);
curl_close($ch);

$arMakeResult = json_decode($jsonMakeResult);

$PROPS = array();
if($arMakeResult->state == "ok"){
	$uid = "report_1_15523";//$arMakeResult->data[0]->uid;
	if($uid){
		// запросить новый отчет
		sleep(5);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://b2bapi.avtocod.ru/b2b/api/v1/dev/user/reports/".$uid."?_detailed=true&_content=true");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Authorization: AR-REST ZGVmYXVsdEB0ZXN0OjE0ODMyMjg4MDA6MTU3NjgwMDAwOnVjQk9kOGZhc3hIMkR3bVgrOHhhcVE9PQ=='
		));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, false);
		$jsonResult = curl_exec($ch);
		curl_close($ch);

		$arResult = json_decode($jsonResult);

		//розыск
		$PROPS["STEALINGS"] = $arResult->data[0]->content->stealings->count;
		//ограничения
		$PROPS["RESTRICTIONS"] = $arResult->data[0]->content->restrictions->count;
		//количество владельцев
		$ownership = array(
			"items" => $arResult->data[0]->content->ownership->history->items,
			"count" => $arResult->data[0]->content->ownership->history->count
		);
		$PROPS["OWNERSHIP"] = json_encode($ownership);



		// print_r($arResult);
	}
}

// print_r($PROPS);

?>