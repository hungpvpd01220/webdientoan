<?php
    require_once("mysql.php");
    include 'head.php';
?>
<?php
   if (isset($_POST["submit"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];
	$email = $_POST["email"];
	if ($username == "" || $password == "" || $email == "") {
		echo "bạn vui lòng nhập đầy đủ thông tin";
	}else{
		$submit = mysql_query("INSERT INTO `dangki` SET
                    `username` = '$username',
                    `password` = '$password',
                    `email` = '$email'");
		echo "chúc mừng bạn đã đăng ký thành công";
	}
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <fieldset style="width: 300px; margin: auto; margin-top: 50px;">
            <legend>Form đăng kí</legend>
            <form method="POST">
                <table boder="0">
                    <tr>
                        <td>Usename: </td>
                        <td><input type="text" name="username"></td>
                    </tr>
                    <tr>
                        <td>Password: </td>
                        <td><input type="password" name="password"></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" name="email"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" value="Đăng kí"></td>
                    </tr>
                </table>
            </form>
            
        </fieldset>
    </body>
</html>
<?php
                        include 'footer.php';
?>