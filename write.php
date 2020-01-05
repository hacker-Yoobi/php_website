<?php
	session_start();
	$URL = "./board_list.php";

	// If user do not have SESSION back to $URL
	if(!isset($_SESSION['userid']))
	{
?>
		<script>
			alert("Login First!");
			location.replace("<?php echo $URL?>");
		</script>
<?php
	}
?>
	<!-- Write new post -->
	<form method = "POST" action = "write_action.php" enctype = "multipart/form-data">
		<table align = "center" width = "850" border = "0">
			<tr>
				<td height = "20" colspan = "2" align = "center" bgcolor = "#ccc"><font color = "white">New Post</font></td>
			</tr>
			<tr>
				<td bgcolor = "white">
			<tr>
				<td>Written by</td>
				<td>
					<input type = "hidden" name = "name" value = "<?=$_SESSION['userid']?>"><?=$_SESSION['userid']?>
				</td>
			</tr>

			<tr>
				<td>Title</td>
				<td>
					<input type = "text" name = "title" size = "74">
				</td>
			</tr>

			<tr>
				<td>Content</td>
				<td>
					<textarea name = "content" cols = "85" rows = "15"></textarea>
				</td>
			</tr>

			<tr>
				<td>File</td>
				<td>
					<input type = "file" name = "upfile" id = "upfile"/>
				</td>
			</tr>
			<tr>
				<td colspan = "2" align = "center">
					<input type = "submit" value = "Submit">
				</td>
			</tr>
		</table>
	</form>



