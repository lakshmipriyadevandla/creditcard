<?php
$conn = mysqli_connect("localhost","id6614294_karate","karate","id6614294_test");

// Check connection
if (mysqli_connect_errno())
  {
  echo json_encode(jsonResponse(300,"Failed to connect to MySQL: " . mysqli_connect_error(),0));
  }
header("Content-Type:application/json");
if(!empty($_GET['ssn'])) {
$ssn=$_GET['ssn'];

$items = getItems($ssn, $conn);
if(empty($items)) {
jsonResponse(201,"SSN Not Found",0);
} else {
jsonResponse(200,"Eligibility Found",1);
}
} else {
jsonResponse(400,"Invalid Request",NULL);
}
function jsonResponse($status,$status_message,$data) {
header("HTTP/1.1 ".$status_message);
$response['status']=$status;
$response['status_message']=$status_message;
$response['data']=$data;
$json_response = json_encode($response);
echo $json_response;
}
function getItems($ssn, $conn) {
$sql = "SELECT * from ssnentry where ssn = ".$ssn;
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
$data = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {
$data[] = $rows;
}
return $data;
}
?>