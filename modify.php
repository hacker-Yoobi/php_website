<?php
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


//                $URL = "./index.php";

if(!isset($_SESSION['userid'])) {
	?>              <script>
		alert("권한이 없습니다.");
	history.back();
	//                                location.replace("<?php echo $URL?>");
	</script>
		<?php   }
		else if($_SESSION['userid']==$usrid) {
			?>
				<form method = "POST" action = "modify_action.php" enctype="multipart/form-data">
				<table  style="padding-top:50px" align = center width=850 border=0 cellpadding=2 >
				<tr>
				<td height=20 align= center bgcolor=#ccc><font color=white> 글수정</font></td>
				</tr>
				<tr>
				<td bgcolor=white>
				<table class = "table2">
				<tr>
				<td>작성자</td>
				<td><input type="hidden" name="id" value="<?=$_SESSION['userid']?>"><?=$_SESSION['userid']?></td>
				</tr>

				<tr>
				<td>제목</td>
				<td><input type = text name = title size=93 value="<?=$title?>"></td>
				</tr>

				<tr>
				<td>내용</td>
				<td><textarea name = content cols=85 rows=15><?=$content?></textarea></td>
				</tr>
				<?php
				if(!strcmp($filename, '0'))
				{
					?>	
						<tr>
						<td>첨부파일</td>
						<td><input type = "file" name= "upfile" id="upfile" /></td>
						</tr>
						<?php
				}
				else
				{
					?>
						<tr>
						<td>첨부파일</td>
						<td><?=$filename?> <a href="modify_file_delte_action.php?number=<?=$number?>">파일삭제</a></td>
						</tr>
						<?php
				}
			?>
				</table>

				<center>
				<input type="hidden" name="number" value="<?=$number?>">
				<input type = "submit" value="작성">
				</center>
				</td>
				</tr>
				</table>
				<?php   }
				else {
					?>              <script>
						alert("권한이 없습니다.");
					history.back();
					//                                location.replace("<?php echo $URL?>");
					</script>
						<?php   }
						?>



