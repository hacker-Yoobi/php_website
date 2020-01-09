<!--
::: CONTENTS :::
Project		: php_website
Version		: 1.0
Filename	: logout.php
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
                alert("Successfully signed out.");
		history.back();
        </script>
<?php   }
?>


