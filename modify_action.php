<!--
::: CONTENTS :::
Project		: php_website
Version		: 1.0
Filename	: modify_action.php
Date		: 2020/01/05
Purpose		: Ready for studying secure coding of WEB(PHP)
Programmer	: Yoobi (ubyung1@gmail.com)
Reviewer	:
-->

<?php
	$connect = mysqli_connect("localhost", "yoobi", "toor", "php_db") or die ("connect fail");
	$number = $_POST["number"];
	$title = $_POST["title"];
	$content = $_POST["content"];
	$date = date('Y-m-d H:i:s');

	if(isset($_FILES['upfile']) && $_FILES['upfile']['name'] != "")
	{
		$file = $_FILES['upfile'];
		$upload_directory='./up_file/';
		$file_name = $file['name'];
		$name_save = $number.'_'.$file_name;

		$max_file_size = 5242880;

		if($file['size'] >= $max_file_size)
		{
?>	
			<script>
				alert("5MB까지만 업로드 가능합니다.");
				history.back();
			</script>
<?php
		}

		if(move_uploaded_file($file['tmp_name'], $upload_directory.$name_save))
		{
			$query = "update board set title='$title', content='$content', date='$date', name_orig='$file_name', name_save='$name_save'";
			$result = $connect->query($query);

			if($result)
			{
?>
				<script>
					alert("글이 수정2되었습니다.");
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
	else
	{
		$query = "update board set title='$title', content='$content', date='$date' where number=$number";
		$result = $connect->query($query);
	
		if($result)
		{
?>
			<script>
				alert("수정되었습니다.");
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
