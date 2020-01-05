<!--
::: CONTENTS :::
Project		: php_website
Version		: 1.0
Filename	: login_action.php
Date		: 2020/01/05
Purpose		: Ready for studying secure coding of WEB(PHP)
Programmer	: Yoobi (ubyung1@gmail.com)
Reviewer	:
-->

<?php
	session_start();

	$connect = mysqli_connect("localhost", "yoobi", "toor", "php_db") or die("fail");

	//Entered ID & PW
	$id=$_GET['id'];
	$pw=$_GET['pw'];

	//Check the ID's existence
	$query = "select * from member where id='$id'";
	$result	= $connect->query($query);


	//If the ID exist
	if(mysqli_num_rows($result)==1)
	{
		$row=mysqli_fetch_assoc($result);

		//If PW correct, make SESSION
		if($row['pw']==$pw)
		{
			$_SESSION['userid']=$id;
			if(isset($_SESSION['userid']))
			{
?>
				<script>
					alert("Successfully signed in.");
					location.replace("./login.php");
				</script>
<?php
			}
			else
			{
				echo "session fail";
			}
		}
		//ID exist but Wrong password
		else
		{
?>
			<script>
				alert("Sorry, Wrong Password.");
				history.back();
			</script>
<?php
		}

	}
	//ID does not exist
	else
	{
?>
		<script>
			alert("Sorry, ID does not exist.");
			history.back();
		</script>
<?php
	}
?>


