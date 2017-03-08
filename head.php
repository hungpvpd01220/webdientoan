<?php
    session_start();
    include ('mysql.php');
?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SHOP THỜI TRANG TRẺ</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
       form table tr td {padding:5px;};
    </style>
    <link href="css/shop-homepage.css" rel="stylesheet">
    <div style="width: 960px; height:150px; margin: auto; ">
        <div style="width: 20%; float: left;">
            <a href="index.php"><img src="css/capture.png" width="90%" height="90%"></a>
        </div>
        <div style="width: 80%; float: right;">
            <img src="http://liyenhouse.com/image/data/Banner%20Thoi%20Trang.jpg" width="100%" height="100%">
        </div>
    </div>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="position: static;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Trang Chủ</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Giới Thiệu</a>
                    </li>
                    <li>
                        <a href="#">Dịch Vụ</a>
                    </li>
                    <li>
                        <a href="#">Liên Hệ</a>
                    </li>
                    
                    
                    <?php if (isset($_SESSION['username'])){
                    echo '<li style=" float: right; margin-left: 700px;">
                        <a href="thoat.php">Thoát</a>
                    </li>';
                    }else{
                        echo'
                            <li>
                                <a href="dangnhap.php">Đăng nhập</a>
                            </li>
                            <li>
                                <a href="dangki.php">Đăng kí</a>
                            </li>';
                    }
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
