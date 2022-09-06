<?php

include("../../apiKey.inc.php");

header("Access-Control-Allow-Origin: *");

$url = "https://api.vultr.com/v2/instances";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Authorization: Bearer ".$apiKey,
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$resp = curl_exec($curl);
curl_close($curl);

$serverInfo = json_decode($resp)->instances;

echo json_encode($serverInfo[0]);

?>
