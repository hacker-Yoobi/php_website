<?php

session_start();
$URL = "./board_list.php";
if(!isset($_SESSION['userid'])) {
	?>

		<script>
		alert("로그인이 필요합니다");
	location.replace("<?php echo $URL?>");
	</script>
		<?php
}
?>

<form method = "POST" action = "write_action.php" enctype="multipart/form-data">
<table style="padding-top:50px" align = center width=850 border=0 cellpadding=2 >
<tr>
<td height=20 align= center bgcolor=#ccc><font color=white> 글쓰기</font></td>
</tr>
<tr>
<td bgcolor=white>
<table class = "table2">
<tr>
<td>작성자</td>
<td><input type="hidden" name="name" value="<?=$_SESSION['userid']?>"><?=$_SESSION['userid']?></td>
</tr>

<tr>
<td>제목</td>
<td><input type = text name = title size=93></td>
</tr>

<tr>
<td>내용</td>
<td><textarea name = content cols=85 rows=15></textarea></td>
</tr>

<tr>
<td>첨부파일</td>
<td><input type = "file" name = "upfile" id="upfile" /></td>
</tr>

</table>
<center>
<input type = "submit" value="작성">
</center>
</td>
</tr>
</table>
</form>



