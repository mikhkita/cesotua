<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>

<?
// генерация токена
$user = "newladamarketing_integration@autodrom";
$pass = "uqBhxbtD9m";
$stamp = time();
$age = 60*60*24;
$passHash = base64_encode(md5($pass, true));
$saltedHash = base64_encode(md5($stamp.':'.$age.':'.$passHash, true));
$token = base64_encode(implode(':', [$user, $stamp, $age, $saltedHash]));

// генерация нового отчета avtocod
//echo $token;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://b2b-api.spectrumdata.ru/b2b/api/v1/user/reports/report_check_ts@autodrom/_make");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'Content-Type: application/json',
	'Authorization: AR-REST '.$token
));
$request = json_encode(array(
	"queryType" => "VIN",
	"query" => "1GYEE63A570178571"
));

curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);

$jsonMakeResult = curl_exec($ch);

// echo "1";
print_r($jsonMakeResult);
die();

?>