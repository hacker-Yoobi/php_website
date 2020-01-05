<!--
::: CONTENTS :::
Project		: php_website
Version		: 1.0
Filename	: join_action.php
Date		: 2020/01/05
Purpose		: Ready for studying secure coding of WEB(PHP)
Programmer	: Yoobi (ubyung1@gmail.com)
Reviewer	:
-->

<?php
	//Connect MYSQL
	$connect = mysqli_connect('localhost', 'yoobi', 'toor', 'php_db') or die("fail");

	$id=$_GET["id"];
	$pw=$_GET["pw"];
	$email=$_GET["email"];
	$date = date('Y-m-d H:i:s');

	//Check the id value exist or not
	$query = "select * from member where id ='$id'";
	$result = $connect->query($query);

	//If id value exist
	if(mysqli_num_rows($result)==1)
	{
?>
		<script>
			alert("This ID is already in use.");
			history.back();	
		</script>
<?php
		exit;
	}

	//Save user entered value in DB	
	$query = "insert into member (id, pw, email, date, permit) values ('$id', '$pw', '$email', '$date', 0)";
	$result = $connect->query($query);

	if($result)
	{
?>
		<script>
			alert('Successfully signed up!');
			location.replace("./login.php");
		</script>

<?php
	}
	else
	{
?>
		<script>
			alert("fail");
		</script>
<?php
	}

	mysqli_close($connect);
?>


