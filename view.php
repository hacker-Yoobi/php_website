<?php
$connect = mysqli_connect('localhost', 'yoobi', 'toor', 'php_db');
$number = $_GET['number'];
session_start();

if(!isset($_SESSION['userid']))
{
	?>
		<script>
		alert("로그인이 필요합니다.");
	history.back();
	</script>
		<?php
		exit();
}

$hit = "update board set hit=hit+1 where number=$number";
$connect->query($hit);
$query = "select title, content, id, date, hit, name_orig from board where number =$number";
$result = $connect->query($query);
$rows = mysqli_fetch_assoc($result);

?>

<style>
	table
	{
		width: 80%;
		border: 1px solid #444444;
	}
	th, td
	{
		border: 1px solid #444444;
		padding: 10px;
	}
</style>


<table align=center>
<tr align=center>
<td colspan="4"><?php echo $rows['title']?></td>
</tr>
<tr align=center>
<td>작성자</td>
<td><?php echo $rows['id']?></td>
<td>조회수</td>
<td><?php echo $rows['hit']?></td>
</tr>


<tr>
<td colspan="4" valign="top" height="500" style="word-break:break-all">
<?php echo $rows['content']?></td>
</tr>



<tr align=center>
<?php		if(!strcmp($rows['name_orig'],'0'))
{
	?>
		<td colspan="4">
		첨부파일이 없습니다.
		</td>
		<?php		}
		else
{
	?>
		<td colspan="4">
		첨부파일 :
		<a href="./download.php?file_id=<?=$number?>"><?php echo $rows['name_orig']?></a>
		<?php		}
		?>
		</td>
		</tr>
		</table>


		<!-- MODIFY & DELETE -->
		<br>
		<center>
		<button onclick="location.href='./board_list.php'">목록으로</button>
		<button onclick="location.href='./modify.php?number=<?=$number?>&id=<?=$_SESSION['userid']?>'">수정</button>

		<button onclick="location.href='./delete.php?number=<?=$number?>&id=<?=$_SESSION['userid']?>'">삭제</button>
		</center>



