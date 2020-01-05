<?php
	$number = $_REQUEST['file_id'];
#	echo $number;
	$connect = mysqli_connect('localhost', 'yoobi', 'toor', 'php_db');
        session_start();
        $query = "select name_save from board where number =$number";
        $result = $connect->query($query);
        $rows = mysqli_fetch_assoc($result);


#	echo $rows['name_orig']
	$filepath = './up_file/'.$rows['name_save'];
	$filesize = filesize($filepath);
	$path_parts = pathinfo($filepath);
	$filename = $path_parts['basename'];
	$extension = $path_parts['extension'];

	header("Pragma: public");
	header("Expries: 0");
	header("Content-Type: application/octet-stream");
	header("Content-Disposition: attachment; filename=$filename");
	header("Content-Transfer-Encoding: binary");
	header("Content-Length: $filesize");

	readfile($filepath);
?>
