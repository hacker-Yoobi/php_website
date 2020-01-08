<!--
::: CONTENTS :::
Project		: php_website
Version		: 1.0
Filename	: modify.php
Date		: 2020/01/05
Purpose		: Ready for studying secure coding of WEB(PHP)
Programmer	: Yoobi (ubyung1@gmail.com)
Reviewer	:
-->

<?php
	//Connect MYSQL & get INFO
	$connect = mysqli_connect("localhost", "yoobi", "toor", "php_db") or die("connect fail");
	$id = $_GET["id"];
	$number = $_GET["number"];
	$query = "select title, content, date, id, name_orig from board where number=$number";
	$result = $connect->query($query);
	$rows = mysqli_fetch_assoc($result);

	$title = $rows['title'];
	$content = $rows['content'];
	$usrid = $rows['id'];
	$filename = $rows['name_orig'];		

	session_start();


	//If user do not have SESSION, reject
	if(!isset($_SESSION['userid']))
	{
?> 
		<script>
			alert("Permission Denied");
			history.back();
		</script>
<?php   
	}
	//If user id not the owner of POST, reject
	else if($_SESSION['userid']==$usrid)
	{
?>
		<form method = "POST" action = "modify_action.php" enctype="multipart/form-data">
			<table align = center width=850 border=0>
				<tr>
					<td height = "20" align = "center" colspan = "2" bgcolor=#ccc><font color=white>Modify Post</font></td>
				</tr>
				<tr>
					<td bgcolor=white>
				<tr>
					<td>Written by</td>
					<td>
						<input type="hidden" name="id" value="<?=$_SESSION['userid']?>"><?=$_SESSION['userid']?>
					</td>
				</tr>
				<tr>
					<td>Title</td>
					<td>
						<input type = text name = title size=74 value="<?=$title?>">
					</td>
				</tr>
				<tr>
					<td>Content</td>
					<td>
						<textarea name = content cols=85 rows=15><?=$content?></textarea>
					</td>
				</tr>
<?php
				//If no file, show basic file upload
				if(!strcmp($filename, '0'))
				{
?>	
					<tr>
						<td>File</td>
						<td><input type = "file" name= "upfile" id="upfile" /></td>
					</tr>
<?php
				}
				//If there is file, show the uploaded file name & delete option
				else
				{
?>
					<tr>
						<td>File</td>
						<td><?=$filename?> <a href="modify_file_delete_action.php?number=<?=$number?>">Delete uploaded file</a></td>
					</tr>
<?php
				}
?>
				<tr>
					<td>
						<input type = "hidden" name="number" value="<?=$number?>">
					</td>
				</tr>
				<tr>
					<td colspan = "2" align = "center">
						<input type = "submit" value = "Submit">
					</td>
				</tr>
		</table>
	</form>
<?php
	}
	else
	{
?>
		<script>
			alert("Permission Denied");
			history.back();
		</script>
<?php
	}
?>



