<?php
$otp = $_POST["eMail"];
$url = "https://verify.twilio.com/v2/Services/VA794ee011ba60b599b8aa96d5d8534742/VerificationCheck";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/x-www-form-urlencoded",
   "Authorization: Basic QUMzZTRhMmE5MzhkN2QwMjczM2I4ZGUyNTMxNjE3NmFmMjo0ZWM3MmFjYTk2MzFiOTJiNGUxMjYwOWMwYmE0MjExMw==",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = "To=%2B6596337422&Code=$otp";

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
var_dump($resp);

?>