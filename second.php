<!DOCTYPE html>
<html>
<head>
	<title>second</title>
<style type="text/css">
	html{width:100%; height:100%;}
	body{width:99%; height:97%;}
	.bodyClass{background: linear-gradient(lightblue,white,lightblue); background-repeat: no-repeat;}
	.common{ height:23vh; width: 35vh; float: left;border: double; border-radius: 0.5em; text-align: center; font-size: 2em; padding: 8vh 0 0 0; box-shadow: grey 0.2em 0 0.5em; background: linear-gradient(lightgreen,green)}
	.common:hover{background: linear-gradient(green,lightgreen); cursor: pointer;}
	.creditIncrease{margin: 25vh 0 0 40vh;}
	.viewBalance{margin: 25vh 0 0 5vh;}
</style>
<script type="text/javascript">
	function increaseCredit()
	{
		window.location.href="third.php";
	}
</script>
</head>
<body class="bodyClass">
<div class="creditIncrease common" onclick="increaseCredit()">Increase your credit balance&#128176;</div>
<div class="viewBalance common" onclick="balance()">View my transactions &nbsp &nbsp&#128179;</div>
</body>
</html>