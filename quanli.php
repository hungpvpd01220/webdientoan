<?php 

session_start();
header('Content-Type: text/html; charset=UTF-8');
require_once("mysql.php"); 
if ( !isset($_SESSION['username']) )
{ 
    echo "Bạn chưa đăng nhập! <a href='dangnhap.php'>Nhấp vào đây để đăng nhập</a> hoặc <a href='dangki.php'>Nhấp vào đây để đăng ký</a>"; 
}
else
{ 
    $user_id = intval($_SESSION['userid']);
    $sql_query = @mysql_query("SELECT * FROM dangki WHERE id='{$user_id}'");
    $member = @mysql_fetch_array( $sql_query ); 
    echo "<center><br>Bạn đang đăng nhập với tài khoản {$member['username']}.</center>"; 
    echo "<center><br><a href='thoat.php'>Thoát ra</a><hr></center>";
    if ($member['admin'] !=="1")  
        echo "Bạn ko phải là admin";
    else
    {
        //Noi dung cac ham, cac lenh va code danh cho admin
        echo "<center>Các code cho admin ở đây</center><br>";
    }
 
} 
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Quản lí sản phẩm</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/shop-homepage.css" rel="stylesheet">
    </head>
    <body>
        <?php
        $user_id = intval($_SESSION['userid']);
       $sql_query = @mysql_query("SELECT * FROM dangki WHERE id='{$user_id}'");
        $member = @mysql_fetch_array( $sql_query );
        if ($member['admin'] =="1"){ 
           
        echo'<div class="list-group">
            <a href="#" class="list-group-item active">
              Bảng Điều khiển Admin
            </a>
            <a href="qlsanpham.php" class="list-group-item">Quản Sản Phẩm</a>
            <a href="sanpham.php?do=send" class="list-group-item">Thêm Sản Phẩm</a>
            <a href="#" class="list-group-item">Quản lý Đơn Hàng</a>
            <a href="thoat.php" class="list-group-item">Thoát</a>
        </div>
    </body>
</html>';
        }
 ?>