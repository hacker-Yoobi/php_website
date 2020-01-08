<!--
::: CONTENTS :::
Project		: php_website
Version		: 1.0
Filename	: modify_action.php
Date		: 2020/01/08
Purpose		: Ready for studying secure coding of WEB(PHP)
Programmer	: Yoobi (ubyung1@gmail.com)
Reviewer	:
-->

<?php
	//Connect MYSQL
	$connect = mysqli_connect("localhost", "yoobi", "toor", "php_db") or die ("connect fail");
	$number = $_POST["number"];
	$title = $_POST["title"];
	$content = $_POST["content"];
	$date = date('Y-m-d H:i:s');

	//if the file exist
	if(isset($_FILES['upfile']) && $_FILES['upfile']['name'] != "")
	{
		$file = $_FILES['upfile'];
		$upload_directory='./up_file/';
		$file_name = $file['name'];
		$name_save = $number.'_'.$file_name;

		$max_file_size = 5242880;
		
		//Check upload file size
		if($file['size'] >= $max_file_size)
		{
?>	
			<script>
				alert("Sorry, only smaller than 5MB file can be uploaded.");
				history.back();
			</script>
<?php
		}
	
		//file uploading part
		if(move_uploaded_file($file['tmp_name'], $upload_directory.$name_save))
		{
			$query = "update board set title='$title', content='$content', date='$date', name_orig='$file_name', name_save='$name_save'";
			$result = $connect->query($query);

			if($result)
			{
?>
				<script>
					alert("Post has been modified sucessfully.");
					location.replace("./view.php?number=<?=$number?>");
				</script>
<?php
			}
			else
			{
				echo "FAIL";
			}

			mysqli_close($connect);
			exit;
		}
	}
	//if the file do not exist
	else
	{
		$query = "update board set title='$title', content='$content', date='$date' where number=$number";
		$result = $connect->query($query);
	
		if($result)
		{
?>
			<script>
				alert("Post has been modified sucessfully.");
				location.replace("./view.php?number=<?=$number?>");
			</script>
<?php  
		}
		else
		{
			echo "fail";
		}
	}
?>
