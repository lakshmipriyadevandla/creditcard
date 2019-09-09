<?php

	$con = mysqli_connect("localhost","id6614294_karate","karate","id6614294_test");
	if (!$con)
		echo "Could not establish connection to remote host";

	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$user=$_POST["username"];
		$pw=$_POST["password"];
		$sql="select * from register where userid='$user' and password='$pw'";
		$res=mysqli_query($con,$sql) ;
		if(mysqli_num_rows($res)>0)
		{
			header('Location: second.php'); 
		}
		else
		{
			echo "<div class='errormsg'>Invalid credentials</div>";
		}
	}
?>
<html>
<head>
<title>Credit</title>
<style>
html{height: 99%; width: 98%;}
body{background-size:cover; background-repeat: no-repeat; height: 80%; width: 100%;}
.loginBox{background: linear-gradient(grey,white); margin:20vh 0 0 15vh; width: 59vh; height: 30vh; opacity:0.8; border-radius:1em;}
.login{margin:3vh 0 0 5vh; float: left; font-size:2em;}
.loginInput{margin:4vh; float: left; }
.clear{clear:both;}
.loginBtn{width: 10vh; height:4vh; border: groove; margin: 10vh 0 0 5vh; position: absolute; text-align: center; padding-top: 1vh; font-size: 1.5em; background-color: skyblue; border-color: skyblue; font-weight: bolder; border-radius:0.5em;}
.loginBtn:hover{cursor: pointer; background-color: lightgreen; border-color: lightgreen; color: brown;}

input{height:2em; width:20em; border-radius: 0.5em;}
</style>
<script>

function verifyUser()
{
	//alert("")
	document.forms["login"].submit();
}
</script>
</head>
<body background="bg.png">
	<form name="login" method="post">
	<div class="loginBox">
		<div class="login">Username</div>
		<input type="text" class="loginInput" name="username">
		<div class="clear"></div>
		<div class="login">Password</div>
		<input type="password" name="password" class="loginInput" >
		<div class="loginBtn" onclick="verifyUser()">Login</div>
	</div>
	</form>
</body>
</html>