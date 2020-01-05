<!--
::: CONTENTS :::
Project		: php_website
Version		: 1.0
Filename	: delete.php
Date		: 2020/01/04
Purpose		: Ready for studying secure coding of WEB(PHP)
Programmer	: Yoobi (ubyung1@gmail.com)
Reviewer	:
-->

<?php
$connect = mysqli_connect("localhost", "yoobi", "toor", "php_db");
$number = $_GET["number"];

$query = "select name_save from board where number=$number";
$result = $connect->query($query);
$rows = mysqli_fetch_assoc($result);

$filename = './up_file/'.$rows['name_save'];
unlink($filename);

$query = "update board set name_orig='0', name_save='0' where number=$number";
$result = $connect->query($query);

?>
<script>
history.back();
</script>
