<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SHOP THỜI TRANG TRẺ</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>
    <!-- Navigation -->
<?php
include 'head.php';
?>
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
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Mặt Hàng</p>
                <div class="list-group">
                    <a href="#" class="list-group-item">Mũ</a>
                    <a href="#" class="list-group-item">Áo</a>
                    <a href="#" class="list-group-item">Quần</a>
                    <a class="list-group-item" href="hdchitiet.php"><img src="http://phapvietpharma.com.vn/images/cart.png">
               Giỏ hàng</a>
                </div>
                 
            </div>

            <div class="col-md-9">

                

           <?php     
           $sql = mysql_query("Select * from qlsanpham");
            $i = 1;
            while ($ok = mysql_fetch_array($sql)){
                    echo'<form method="post" action="cart.php?do=add">
                        <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="'.$ok['Anh'].' " alt="">
                            <div class="caption">
                                <h4><a href="#">'.$ok['Tensanpham'].'</a>
                                </h4><br>
                                <p>'.$ok['Mota'].'</p>  
                                   <h4 style="color:red; font-weight:bold;"> <p>Giá: '.vnd($ok['Gia']).'</p></h4>
                            </div>
                            <div class="ratings">
                                <p>
                                    <span>
                                       <input type="number" min="1" style="width: 50px;" name="qty" value="1" size="3" />
                                        <input type="hidden" name="id" value="'.$ok['Id'].'" />
                                            <input type="submit" name="ok" class="btn btn-primary" value="Mua">
                                    </span>
                                    <span>
                                        <a class="btn btn-success" target="_blank" 
                                           href="#">Chi Tiết</a>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div></form>';
            }
                        ?>
                    
               </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

<?php
                        include 'footer.php';
?>

    </div>
    <script src="js/jquery.js"></script>
    <script src="js/login.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
