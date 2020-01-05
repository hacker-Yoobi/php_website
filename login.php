<!--
::: CONTENTS :::
Project		: php_website
Version		: 1.0
Filename	: login.php
Date		: 2020/01/05
Purpose		: Ready for studying secure coding of WEB(PHP)
Programmer	: Yoobi (ubyung1@gmail.com)
Reviewer	:
-->

<?php
	session_start();
?> 
<html>
	<head>
		<meta charset='utf-8'>
	</head>

	<body>
<?php
	//If SESSION is not exist
	if(!isset($_SESSION["userid"]))	
	{
?>
		<center>
			<form method='get' action='./login_action.php'>
				<input name="id" type="text" placeholder="ID" required autofocus><br>
				<input name="pw" type="password" placeholder="PASSWORD"><br><br>
				<input type="submit" value="SIGN IN"><br>
			</form>
			<button id="join" onclick="location.href='./join.html'">SIGN UP</button>
		</center>
		<?php
}
	else
	{
?>
		<center>
			Welcome! <?=$_SESSION["userid"]?><br><br>
			<button onclick="location.href='./logout.php'">LOGOUT</button>
		</center>
<?php
	}
?>
	</body>
</html>



