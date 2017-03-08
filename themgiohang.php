<?php
	if (isset($_SESSION['cart'])==false)
		{
		echo "Chưa chọn mua gì cả";
		exit();
		}
	$sql="select * from hoadon where sanpham_id in ({$_SESSION['cart']})";
	$result = mysql_query($sql,$link);
	?>
<div align="center">
	<table border="1" width="600" align="left" cellspacing="0" cellpadding="0" id="table1">
		<tr>
			<td><b>Sản phẩm đã chọn mua</b></td>
			<td><b>Giá</b></td>
		</tr>

<?php
$tongtien=0;
if (mysql_num_rows($result)!=0) 
{					  	 						 
	while($row = mysql_fetch_object($result))

		{
			$sanpham_id= $row->sanpham_id;
			$sanpham_ten= $row->sanpham_ten;
			$sanpham_ghichu=$row->sanpham_ghichu;
			$sanpham_gia= $row->sanpham_gia;
			$tongtien+=$sanpham_gia;
			echo "<tr><td align='left'><b>Tên SP:</b> $sanpham_ten <br><b>Thông tin thêm:</b> $sanpham_ghichu</b>$sanpham_gia";
			echo "</td><td><b>Giá:</b>$sanpham_gia</td></tr>";
			//echo "<tr><td colspan=2><hr></td></tr>";
			
		}
	echo "<tr><td align='left'><b>Tổng cộng:</b>";
	echo "</td><td><b>$tongtien</b></td></tr>";
	}
	else echo "Chưa có sản phẩm nào";
?>

	</table>
</div>
<?
if ($_GET['ok']=="1")
	{
	$sql="INSERT INTO `hoadon` (`hoadon_sanpham`, `hoadon_tongtien`) VALUES ('$sanpham', '$tongtien');";
	$result = mysql_query($sql,$link);
	if ($result)
		echo "Hóa đơn của bạn đã đc lưu";
	}
?>
<p><b><a href="?act=thanhtoan&ok=1">
<font size="6">Bấm vào đây nếu chấp nhận thanh toán</font></a></b></p>