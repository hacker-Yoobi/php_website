<!--
::: CONTENTS :::
Project		: php_website
Version		: 1.0
Filename	: delete.php
Date		: 2020/01/05
Purpose		: Ready for studying secure coding of WEB(PHP)
Programmer	: Yoobi (ubyung1@gmail.com)
Reviewer	:
-->

<?php
	session_start();
        $result = session_destroy();
 
        if($result) {
?>
        <script>
                alert("로그아웃 되었습니다.");
		history.back();
        </script>
<?php   }
?>


