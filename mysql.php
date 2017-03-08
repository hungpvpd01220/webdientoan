<?php
$db_host = "localhost";
$db_name    = 'assignment';
$db_username    = 'root';
$db_password    = '';
$connect = @mysql_connect($db_host, $db_username, $db_password) or die("Không thể kết nối database");
@mysql_select_db($db_name) or die("Không thể chọn database");
@mysql_query("SET NAMES 'utf8'", $connect);
?>

