<?php 
session_start();
	$ssn=$_POST["ssn"];
		$cardno=$_POST["creditnum"];
				$zip=$_POST["zip"];
						$demand=$_POST["amount"];
function increaseLimit($name, $ssn , $cardno , $zip , $demand ) {
$con = mysqli_connect("localhost","id6614294_karate","karate","id6614294_test");
if(mysqli_connect_errno())
{
	echo "Connection Fail".mysqli_connect_error();
    
}
             //Card Number Validation   

$sql="select * from register where Name='$name' and SSN='$ssn'and CardNo='$cardno'and Zip='$zip'";
 
  $result= mysqli_query($con,$sql);
  $count = mysqli_num_rows($result);
    




if(0)
{
$myObj = new \stdClass();
$myObj->status = "Failure";
$myObj->data = "";
$myObj->error = "Card Details Invalid";

$myJSON = json_encode($myObj);
$myresult=json_decode($myJSON);
echo $myresult->status ;
echo "<br>";
echo $myresult->error;
  
}
           //Amount requested validation
$sql="select CreditLimit from register where SSN='$ssn'and CardNo='$cardno'and Zip='$zip'";
$ret=mysqli_query($con,$sql);

$row=mysqli_fetch_array($ret,MYSQLI_NUM);
$value=$row[0];

if($demand<=$value)
{
$myOb = new \stdClass();
$myOb->status = "Failure";
$myOb->data = "Invalid. Depreciation requested ";
$myOb->error = "";

$myJSON = json_encode($myOb);
 $d=json_decode($myJSON);
 echo $d->status ;
 echo "<br>";
 echo $d->data;
}
else
{
	// API CALL
	//echo $ssn;
 $url = "https://kish16124it.000webhostapp.com/creditapi/thirdpartyapi.php?ssn=".$ssn;
    $client = curl_init($url);
    curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
    $response = curl_exec($client);
    $a = json_decode($response,true);
    //$creditscores = ($result['data']);
    //RESULT JSON
//$a=json_decode($ans);
echo "<h1>";
if($a['status']=="Successful")
{
	$sql="update register set CreditLimit='$demand' where SSN='$ssn'and CardNo='$cardno'and Zip='$zip'";
 
     mysqli_query($con,$sql);
        echo "Credit limit increased to ".$demand;
}
else if($a['status']=="Failure")
{
        echo "Transaction failed. Condition not met: ".$a['data'];
}
else
{
     echo "Error Occured: ".$a['error'];
}
}
echo "</h1>";

}

increaseLimit("Kishore",$ssn,$cardno,$zip,$demand);

?>