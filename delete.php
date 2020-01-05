<?php
$connect = mysqli_connect("localhost", "yoobi", "toor", "php_db") or die("connect fail");
$id = $_GET["id"];
$number = $_GET["number"];
$query = "select title, content, date, id, name_orig, name_save from board where number=$number";
$result = $connect->query($query);
$rows = mysqli_fetch_assoc($result);

$title = $rows['title'];
$content = $rows['content'];
$usrid = $rows['id'];
$filename = './up_file/'.$rows['name_save'];
$file_check = 0;
session_start();


$URL = "./board_list.php";

/*    if(!isset($_SESSION['userid'])) {
      ?>              <script>
      alert("권한이 없습니다.");
      location.replace("<?php echo $URL?>");
      </script>
      <?php   }*/
if($_SESSION['userid']==$usrid) {
	$query = "delete from board WHERE number=$number";
	$result = $connect->query($query);
	if($result){
		$file_check = strcmp($rows['name_orig'], '0');
		if($file_check)
		{
			unlink($filename);
		}
		?>			        <script>
			alert("<?php echo "글이 삭제되었습니다."?>");
		location.replace("<?php echo $URL?>");
		</script>
<?php
	}

	else {
		?>              <script>
			alert("권한이 없습니다.");
		history.back();
		//                                location.replace("<?php echo $URL?>");
		</script>
			<?php   }
}
?>
