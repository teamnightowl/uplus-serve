<?php

include('keys.php');

if(isset($_GET['id']))
{

  echo $acctnum = $_GET['id'];

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api-uat.unionbankph.com/uhac/sandbox/accounts/$acctnum",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "accept: application/json",
      "x-ibm-client-id: $client",
      "x-ibm-client-secret: $secret"
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    echo $response;
  }
}
