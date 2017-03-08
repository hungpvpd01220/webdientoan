<?php
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
?>
<?php
include 'head.php';
include ('mysql.php');
if (isset($_GET['do']))
        $do = $_GET['do'];
        else
        $do = '';
switch ($do){
    case 'add':
if(isset($_POST["ok"])){
{
	$product_code 	= filter_var($_POST["id"], FILTER_SANITIZE_STRING); //product code
	$product_qty 	= filter_var($_POST["qty"], FILTER_SANITIZE_NUMBER_INT); //product code
        if($product_qty > 10){
		die('<div align="center">This demo does not allowed more than 10 quantity!<br /><a href="http://sanwebe.com/assets/paypal-shopping-cart-integration/">Back To Products</a>.</div>');
	}

	//MySqli query - get details of item from db using product code
	$results = mysql_query("SELECT * FROM qlsanpham WHERE id='$product_code' LIMIT 1");
	$obj = mysql_fetch_array($results);
	
	if ($results) { //we have the product info 
		
		//prepare array for the session variable
		$new_product = array(array('name'=>$obj['Tensanpham'], 'code'=>$product_code, 'qty'=>$product_qty, 'price'=>$obj['Gia']));
		
		if(isset($_SESSION["products"])) //if we have the session
		{
			$found = false; //set found item to false
			
			foreach ($_SESSION["products"] as $cart_itm) //loop through session array
			{
				if($cart_itm["code"] == $product_code){ //the item exist in array

					$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'qty'=>$product_qty, 'price'=>$cart_itm["price"]);
					$found = true;
				}else{
					//item doesn't exist in the list, just retrive old info and prepare array for session var
					$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'qty'=>$cart_itm["qty"], 'price'=>$cart_itm["price"]);
				}
			}
			
			if($found == false) //we didn't find item in array
			{
				//add new user item in array
				$_SESSION["products"] = array_merge($product, $new_product);
			}else{
				//found user item in array list, and increased the quantity
				$_SESSION["products"] = $product;
			}
			
		}else{
			//create a new session var if does not exist
			$_SESSION["products"] = $new_product;
		}
		
}
header('location: ?do=show');
}
}
break;
    case 'show':
        if(isset($_SESSION["products"]))
    {
	    $total = 0;
		echo '<form method="post" action="paypal-express-checkout/process.php" style="border: 1px solid;
    width: 800px; margin:auto; margin-top:50px;">';
		echo '<ul>';
		$cart_items = 0;
		foreach ($_SESSION["products"] as $cart_itm)
        {
           $product_code = $cart_itm["code"];
		   $results = mysql_query("SELECT * FROM qlsanpham WHERE id='$product_code' LIMIT 1");
		   $obj = mysql_fetch_array($results);
		   $currency = $cart_itm["qty"];
		    echo '<li class="cart-itm">';
            echo '<div class="product-info">';
			echo '<h3>'.$obj['Tensanpham'].' (Code :'.$product_code.')</h3> ';
            echo '<div>'.$obj['Mota'].'</div><br>';
			echo '</div>';
                        echo '<div><div class="p-qty">Số lượng : '.$cart_itm["qty"].'</div>';
                        echo '<div class="p-price">Giá: '.vnd($currency*$obj['Gia']).'</div>';
                        echo '<span class="remove-itm"><a href="cart.php?do=del&removep='.$cart_itm["code"].'">Xóa sản phẩm</a></span></div>';
            echo '</li>';
			$subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
			$total = ($total + $subtotal);

			echo '<input type="hidden" name="item_name['.$cart_items.']" value="'.$obj['Tensanpham'].'" />';
			echo '<input type="hidden" name="item_code['.$cart_items.']" value="'.$obj['Id'].'" />';
			echo '<input type="hidden" name="item_desc['.$cart_items.']" value="'.$obj['Mota'].'" />';
			echo '<input type="hidden" name="item_qty['.$cart_items.']" value="'.$cart_itm["qty"].'" />';
			$cart_items ++;
			
        }
    	echo '</ul>';
		echo '<span class="check-out-txt">';
		echo '<strong>Tổng Tiền : '.vnd($currency*$total).' <a href="ghihoadon.php?do=payment"> Thanh Toán</a></strong>  ';
		echo '</span>';
		echo '</form><br>';
                echo '<center><a href="index.php">Bấm vào đây để tiếp tục mua hàng</a></center><br>';
		
    }else{
		echo 'Không có sản phẩm nào!!!';
	}
        break;
    case 'del':
        if(isset($_SESSION["products"]))
{
	$product_code 	= $_GET["removep"]; //get the product code to remove
	
	foreach ($_SESSION["products"] as $cart_itm) //loop through session array var
	{
		if($cart_itm["code"]!=$product_code){ //item does,t exist in the list
			$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'qty'=>$cart_itm["qty"], 'price'=>$cart_itm["price"]);
		}
		
		//create a new product list for cart
		$_SESSION["products"] = $product;
	}
	
	//redirect back to original page
        header('location: ?do=show');
}
        break;
    case 'payment':
        if(isset($_POST['submit'])){
                //khai bao bien
                $ten = $_POST['hoten'];
                $email = $_POST['email'];
                $sdt = $_POST['sdt'];
                $diachi = $_POST['diachi'];
                $ok = mysql_query("Insert Into Hoadon Set
                    `Tenkhachhang` = '$ten',
                    `Diachi` = '$email',
                    `Email` = '$diachi',
                    `Sdt` = '$sdt'
                        ");
                $cart_items = 0;
               $mahd = mysql_insert_id();
		foreach ($_SESSION["products"] as $cart_itm)
        {
                   $product_code = $cart_itm["code"];
		   $results = mysql_query("SELECT * FROM qlsanpham WHERE id='$product_code' LIMIT 1");
		   $obj = mysql_fetch_array($results);
		   $currency = $cart_itm["qty"];
                   $ok = mysql_query("Insert Into Hoadonchitiet Set
                    `Tensp` = '".$obj['Tensanpham']."',
                    `Sl` = '".$cart_itm['qty']."',
                    `Gia` = '".$obj['Gia']."',
                    `Masp` = '".$obj['Id']."',
                    `Mahd` = '$mahd'
                        ");
        }
                if($ok){
                    echo'ok';
                }else{
                    echo'Loi';
                }
        }
        echo'<fieldset style="width: 300px; margin:auto;">
            <legend>Gui san pham</legend>
            <form method="POST" action="cart.php?do=payment">
                <table boder="0">
                    <tr>
                        <td>Ho và tên: </td>
                        <td><input type="text" name="hoten"></td>
                    </tr>
                    <tr>
                        <td>Đia chỉ: </td>
                        <td><input type="text" name="diachi"></td>
                    </tr><tr>
                        <td>Email: </td>
                        <td><input type="text" name="email"></td>
                    </tr>
                    <tr>
                        <td>Số điện thoai:</td>
                        <td><input type="text" name="sdt"></td>
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" value="Thanh toán"></td>
                    </tr>
                </table>
            </form>
            
        </fieldset>';
        break;
}
include 'footer.php';
?>