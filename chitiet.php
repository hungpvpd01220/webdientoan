<!DOCTYPE html>
<html lang="en">
    <?php
    include 'head.php';
    ?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>
    <div class="container">

        <div class="row" style="padding-top: 70px;">
            <div class="col-md-4"><img src="http://mecuti.vn/wp-content/uploads/2015/02/3-kieu-ao-so-mi-nu-han-quoc-dep-he-2015-duyen-dang-cuon-hut-cac-nang-nen-co-15.jpg" width="320px" height="320px" /></div>
            <div class="col-md-8">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thông Tin</a></li>
              <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Chi Tiết Sản Phẩm</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="home">
              <h3>Áo Cổ Phối Ren GaiA SA3 - Đen</h3>
                  <p>MIỄN PHÍ VẬN CHUYỂN</p>
                  <p><span style="color: red">339,000 đ</span></p>
                  <p><a href="index.php">Quay tro lai trang mua hang</a></p>
                  <form role="form" action="index.php" method="get">
                  <input type="hidden" name="act" value="add">
                  <label> Số lượng: <input type="number" name="soluong" min="1" max="100" value="1" style="width: 60px; text-align: center;"></label>
                  <input type="hidden" name="sanpham" value="'.$res['id'].'">
                  <input type="submit" class="btn btn-primary" value="Mua Ngay" name="action"></form>
                  </div>
              <div role="tabpanel" class="tab-pane" id="profile"><br/><p>Chi tiết sản phẩm đang được cập nhật</p></div>
              <div role="tabpanel" class="tab-pane" id="messages"><br/>
              <div class="row">
             <div class="col-lg-6"></div>
              </div></div>
              <div role="tabpanel" class="tab-pane" id="settings"><br/>
              <img class="img-responsive" src="http://hanghieusales.com/wp-content/themes/hanghieu/images/don-hang.png">
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
