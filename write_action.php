<?php
$connect = mysqli_connect("localhost", "yoobi", "toor", "php_db") or die("fail");

$id = $_POST["name"];                      //Writer
$pw = 0;                        //Password
$title = $_POST["title"];                  //Title
$content = $_POST["content"];              //Content
$date = date('Y-m-d H:i:s');            //Date

$URL = './board_list.php';                   //return URL

$query = "INSERT INTO board (number, title, content, id, password, date, hit, name_orig, name_save) VALUES (null, '$title', '$content', '$id', '$pw', '$date', 0, 0, 0)"; 
$result = $connect->query($query);	

if(isset($_FILES['upfile']) && $_FILES['upfile']['name'] != "")
{
	$file = $_FILES['upfile'];
	$upload_directory='./up_file/';
	$file_name = $file['name'];

	$max_file_size = 5242880;

	if($file['size'] >= $max_file_size)
	{
		?>
			<script>
			alert("<?php echo "5MB까지만 업로드 가능합니다."?>");
		history.back();
		</script>
			<?php
	}
	$query = "select LAST_INSERT_ID() from board";
	$result = $connect->query($query);
	$rows = mysqli_fetch_assoc($result);

	$number = $rows['LAST_INSERT_ID()'];


	$name_save = $number.'_'.$file_name;			

	if(move_uploaded_file($file['tmp_name'], $upload_directory.$name_save))
	{
		$query = "update board set name_orig = '$file_name', name_save = '$name_save' where number=$number";
		$result = $connect->query($query);


		if($result)
		{
			?>              		    <script>
				alert("<?php echo "글이 등록2되었습니다."?>");
			location.replace("<?php echo $URL?>");
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

	if($result)
	{
		?>              	    <script>
			alert("<?php echo "글이 등록되었습니다."?>");
		location.replace("<?php echo $URL?>");
		</script>
			<?php
	}
	else
	{
		echo "FAIL";
	}


	mysqli_close($connect);
} 
?>


