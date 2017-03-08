<?php
include 'head.php';
header('Content-Type: text/html; charset=UTF-8');
if (session_destroy()) 
    echo "<center>Thoát thành công!</center>";
else
    echo "KO thể thoát dc, có lỗi trong việc hủy session";
 
echo '<center><br><a href="index.php">Bấm vào đây để quay lại trang chủ<br></a></center>';
?>
<?php
include 'footer.php';
?>