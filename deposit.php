<?php

include('keys.php');

$target_account = $_GET['acct1'];
$source_account = $_GET['acct2'];
$amount = $_GET['amount'];


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api-uat.unionbankph.com/uhac/sandbox/transfers/initiate",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"channel_id\":\"NIGHTOWL_TEAM\",\"transaction_id\":\"" . rand() . "\",\"source_account\":\"$source_account\",\"source_currency\":\"PHP\",\"target_account\":\"$target_account\",\"target_currency\":\"PHP\",\"amount\":$amount}",
  CURLOPT_HTTPHEADER => array(
    "accept: application/json",
    "content-type: application/json",
    "x-ibm-client-id: $client",
    "x-ibm-client-secret: $secret"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo false;
} else {
  echo true;
}
