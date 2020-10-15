<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>

<?
// генерация токена
$user = "newladamarketing@yandex.ru";
$pass = "Tomlada999200";
$stamp = time();
$age = 60*60*24;
$passHash = base64_encode(md5($pass, true));
$saltedHash = base64_encode(md5($stamp.':'.$age.':'.$passHash, true));
$token = base64_encode(implode(':', [$user, $stamp, $age, $saltedHash]));

// генерация нового отчета avtocod
echo $token;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://b2bapi.avtocod.ru/b2b/api/v1/dev/user/reports/default/_make");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'Content-Type: application/json',
	'Authorization: AR-REST '.$token
));
$request = json_encode(array(
	"queryType" => "VIN",
	"query" => "Z94CB41AAGR323020"
));
curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);

$jsonMakeResult = curl_exec($ch);

print_r($jsonMakeResult);
die();

?>