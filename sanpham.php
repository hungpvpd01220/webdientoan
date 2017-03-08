<html>
    <head>
        <meta charset="UTF-8">
        <title>Gửi Sản Phẩm</title>
    </head>
    <body>
        <?php
    include 'head.php';
    include 'mysql.php';
    if (isset($_GET['do']))
        $do = $_GET['do'];
        else
        $do = '';
    switch ($do){
        case 'send':
            if(isset($_POST['submit'])){
                //khai bao bien
                $tensp = $_POST['tensp'];
                $mota = $_POST['mota'];
                $soluong = $_POST['soluong'];
                $gia = $_POST['gia'];
                $anh = $_POST['anh'];
                $ok = mysql_query("Insert Into qlsanpham Set
                    `Tensanpham` = '$tensp',
                    `Soluong` = '$soluong',
                    `Gia` = '$gia',
                    `Mota` = '$mota',
                    `Anh` = '$anh'
                        ");
                if($ok){
                    echo'Sản phẩm đã thêm thành công!';
                }else{
                    echo'Thêm sản phẩm không thành công!';
                }
            }
           echo'<fieldset style="width: 300px; margin:auto;">
            <legend>Gửi sản phẩm</legend>
            <form method="POST" action="sanpham.php?do=send">
                <table boder="0">
                    <tr>
                        <td>Tên sản phẩm: </td>
                        <td><input type="text" name="tensp"></td>
                    </tr>
                    <tr>
                        <td>Mô tả: </td>
                        <td><textarea type="text" name="mota"></textarea></td>
                    </tr><tr>
                        <td>Link anh: </td>
                        <td><input type="text" name="anh"></td>
                    </tr>
                    <tr>
                        <td>Số lượng:</td>
                        <td><input type="number" name="soluong"></td>
                    </tr>
                    <tr>
                        <td>Giá:</td>
                        <td><input type="number" name="gia"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" value="Đăng sản phẩm"></td>
                    </tr>
                </table>
            </form>
            
        </fieldset>';
            
            break;
        case 'edit':
            break;
        case 'del':
            break;
        default :
           $sql = mysql_query("Select * from qlsanpham");
            $i = 1;
            echo'<table border="1" style="margin:auto;">
            <tr><td>stt</td><td>Ten</td><td>So luong</td><td>gia</td></tr>';
           while ($ok = mysql_fetch_array($sql)){
    echo'<tr><td>'.$i.'</td><td>'.$ok['Tensanpham'].'</td><td>'.$ok['Soluong'].'</td><td>'.$ok['Gia'].' vnd</td></tr>';
           $i++;
           }
            break;
    }
    ?>
    </body>
</html>
<?php
include 'footer.php';
?>