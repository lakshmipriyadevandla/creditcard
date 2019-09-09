<!DOCTYPE html>
<html>
<head>
	<title>third</title>
<style type="text/css">
	html{width:100%; height:100%;}
	body{width:99%; height:73%;}
	.bodyClass{background: linear-gradient(coral,white,coral); background-repeat: no-repeat;}
	.increaseInput{margin:25vh 0 0 15vh; border: groove; width: 30vh; height: 40vh; padding: 1.5vh; border-radius: 1em; background-color: font-weight:bolder; font-size: 1.5em;}
	.selectAmount{width:30vh; height: 5vh;}
	input{width:30vh; height:5vh; margin: 0 0 3vh 0; border-radius: 0.8em;}
	input::placeholder{color: green; font-weight: bolder; font-size: 1.5em; padding-left: 0.2em;}
	.submit{width:10vh; height: 4vh; border: groove; border-radius: 0.2em; text-align: center; 
		padding: 0.7em 0 0 0; margin: 2vh 0 0 8vh; background: linear-gradient(orange,white); 
		border-color:orange;}
	.submit:hover{cursor: pointer; background: linear-gradient(white,orange);}
</style>
<script type="text/javascript">
	function increaseCredit()
	{
		if(document.getElementById("creditnum").value=="" || document.getElementById("zip").value=="" || document.getElementById("SSN").value=="" || document.getElementById("selectAmount").value=="def")
			alert("Field missing");
		else
			alert("please enter the fields");
	}
</script>

</head>
<body class="bodyClass">
	<form name="increaseDetails" method="post" action="increaselimit.php">
		<div class="increaseInput">
			<input type="text" name="creditnum" id="creditnum" placeholder="Credit card number">
			<input type="password" name="zip" placeholder="Zip" id="zip">
			<input type="text" name="ssn" placeholder="SSN" id="SSN">
			<select class="selectAmount" id="selectAmount" name="amount">
				<option value="def">Select amount</option>
				<option value="30000" >30000</option>
				<option value="40000" >40000</option>
				<option value="50000" >50000</option>
			</select>
			<input type="submit" value="apply" >

		</div>
	</form>
</body>
</html>