<?php
         include 'mysql.php';
           include 'head.php';
       if(isset($_POST["ok"]))
    {
           $ten = $_POST["ten"];
           $diachi = $_POST["diachi"];
           $sdt = $_POST["sdt"];
           $email = $_POST["email"];
           $ok = mysql_query("Insert into `hoadon` set
               `ten` = '$ten',
               `diachi` = '$diachi',
               `email` = '$email',
               `sdt` = '$sdt'
               ");
           $hd = mysql_insert_id();
            if(isset($_SESSION["products"]))
    {
        foreach ($_SESSION["products"] as $cart_itm)
        {
           $product_code = $cart_itm["code"];
           $results = mysql_query("SELECT * FROM qlsanpham WHERE id='$product_code' LIMIT 1");
           $ok1 = mysql_fetch_array($results);
           $ok2 = mysql_query("Insert into `hoadonchitiet` set
               `Tensp` = '".$ok1['Tensanpham']."',
               `Sl` = '".$cart_itm["qty"]."',
               `Gia` = '".$ok1['Gia']."',
               `Mahd` = '$hd'
               ");
            
        }
    }
        if($ok && $ok2){
    echo'hóa đơn được ghi nhận';
    unset($_SESSION["products"]);
        }else{
          echo'thất bại';
      
        }
    }else{
        echo '<form action="ghihoadon.php" method="post" style="margin:auto; width:400px;">
    <table width="400" cellspacing="1" style="border-collapse: collapse" bordercolor="#C0C0C0">
        <tr>
            <td>Tên:</td>
            <td><input type="text" name="ten" value=""></td>
        </tr>
        <tr>
            <td>Đia chỉ:</td>
            <td><input type="text" name="diachi" value=""></td>
        </tr>
        <tr>
            <td>Số điện thoại:</td>
            <td><input type="text" name="sdt" value=""></td>
        </tr>
        <tr>
            <td>Địa chỉ E-mail:</td>
            <td><input type="text" name="email" value=""></td>
        </tr>
        <tr>
            <td><input type="submit" name="ok" value="Thanh Toán"></td>
            <td></td>
        </tr>
    </table>
</form>';
    }
include 'Footer.php';
        ?>