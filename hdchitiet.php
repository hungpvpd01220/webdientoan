<?php
         include 'mysql.php';
         include 'head.php';
        function vnd($strNum) {
                $changer = str_replace('VNĐ', '',$strNum);
                $changer = str_replace(',', '', $changer);
                $changer = trim(str_replace('.', '', $changer));
                $len = strlen($changer);
                $counter = 3;
                $result = "";
                while ($len - $counter >= 0)
                {
                    $con = substr($changer, $len - $counter , 3);
                    $result = '.'.$con.$result;
                    $counter+= 3;
                }
                $con = substr($changer, 0 , 3 - ($counter - $len) );
                $result = $con.$result;
                if(substr($result,0,1)=='.'){
                    $result=substr($result,1,$len+1);   
                }
                return $result.' VNĐ';
        }

         if(isset($_GET['do']) == 'hoadon'){
            $id = $_GET['id'];
            $sql = mysql_query("select * from hoadon where Id='$id'");
            $okok = mysql_fetch_array($sql);
            echo '<center><h3> Hóa đơn '.$okok['Id'].'</h3>
             <h4>Họ và tên : '.$okok['ten'].'</h4p>
             <h4>SĐT : '.$okok['sdt'].'</h4></center>';
            
             $query1 = mysql_query("select * from hoadonchitiet where Mahd= '$id'");
                 echo'<center><table border="1" width="600" cellspacing="1" style="border-collapse: collapse" bordercolor="#C0C0C0">
        <tr>
            <td>Tên sản phẩm</td>
            <td>Giá</td>
            <td>Số lượng</td>
            <td>Thành tiền</td>
        </tr>';
                 $tong = 0;
                 $tong1 = 0;
    while ($ok1 = mysql_fetch_array($query1)){
        $tong = $ok1['Gia']*$ok1['Sl'];
        echo'<tr>
            <td>'.$ok1['Tensp'].'</td>
            <td>'.vnd($ok1['Gia']).'</td>
            <td>'.$ok1['Sl'].'</td>
                <td>'.vnd($tong).'</td>
        </tr>';
        $tong1 +=$tong;
        }
         echo'</table><h4>tổng tiền cần trả: '.vnd($tong1).'</h4></center>';
         }
         echo '<center><h2>Danh sách hóa đơn</h2></center>';
         $query = mysql_query("select * from hoadon order by id");
    echo'<center><table border="1" width="600" cellspacing="1" style="border-collapse: collapse" bordercolor="#C0C0C0">
        <tr>
            <td>Tên</td>
            <td>SĐT</td>
            <td>Email</td>
            <td>Địa chỉ</td>
        </tr>';
    while ($ok = mysql_fetch_array($query)){
        
        echo'<tr>
            <td>'.$ok['ten'].'</td>
            <td>'.$ok['sdt'].'</td>
            <td>'.$ok['email'].'</td>
            <td>'.$ok['diachi'].'</td>
           <td><a href="?do=hoadon&id='.$ok["Id"].'">xem</a></td>
        </tr>';
        }
    echo'</table></center>';
include 'Footer.php';
        ?>