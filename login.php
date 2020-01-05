<?php
session_start();
?> 
<html>
<head>
<meta charset='utf-8'>
</head>

<body>
<?php
if(!isset($_SESSION["userid"]))	
{
	?>
		<center>

		<form method='get' action='./login_action.php'>
		<input name="id" type="text" placeholder="아이디" required autofocus><br>
		<input name="pw" type="password" placeholder="비밀번호"><br><br>
		<input type="submit" value="로그인"><br>
		</form>
		<button id="join" onclick="location.href='./join.php'">회원가입</button>
		</center>
		<?php
}
else
{
	?>
		<center>
		<?=$_SESSION["userid"]?>님 환영합니다.<br><br>
		<button onclick="location.href='./logout.php'">로그아웃</button>
		</center>
		<?php
}
?>


</body>

</html>



