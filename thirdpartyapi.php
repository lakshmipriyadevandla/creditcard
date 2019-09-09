<?php

header("Content-Type:application/json");
$ssn=$_GET['ssn'];

$url = "https://kish16124it.000webhostapp.com/creditapi/ssnvalidation.php?ssn=".$ssn;
$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);
$result = json_decode($response);

if($result->data==1) {
    
    $url = "https://kish16124it.000webhostapp.com/creditapi/credit.php?ssn=".$ssn;
    $client = curl_init($url);
    curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
    $response = curl_exec($client);
    $result = json_decode($response,true);
    $creditscores = ($result['data']);
    unset($creditscores['ssn']);

    $flipped = array_flip($creditscores);
    
    ksort($flipped);
    if(array_keys($flipped, min($flipped))>=650) {
        jsonResponse("Successful",NULL,NULL);
    }
    else
    {
        jsonResponse("Failure","Credit score very low",NULL);
    }
    

}
else {
    jsonResponse("Failure",NULL,"Invalid ssn");

}

function jsonResponse($status,$data,$error) {
header("HTTP/1.1 ".$status);
$response['status']=$status;
$response['data']=$data;
$response['error']=$error;
$json_response = json_encode($response);
echo $json_response;
}
?>