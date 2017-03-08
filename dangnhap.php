<?php
        include 'head.php';
	require_once("mysql.php");
        if ( isset($_GET['act']) == "login" ){
	if (isset($_POST["submit1"])) {
		// lấy thông tin người dùng
		$username = $_POST["username"];
		$password = $_POST["password"];
		if ($username == "" || $password =="") {
			echo "username hoặc password bạn không được để trống!";
		}else{
			$query = mysql_query("SELECT * FROM dangki WHERE username='".$username."' and password = '$password'");
			$num_rows = mysql_fetch_array($query);
			if ( mysql_num_rows($query) <= 0 )
    {
				echo "Tên đăng nhập hoặc mật khẩu không đúng !";
			}else{
                            $query = mysql_query("SELECT * FROM dangki WHERE username='".$username."' and password = '$password'");
			$num_rows = mysql_fetch_array($query);
				$_SESSION['username'] = $username;
                                $_SESSION['userid'] = $num_rows['id'];
                                $_SESSION['admin'] = $num_rows['admin'];
                                if ($num_rows['admin'] == '1')
                                    header('Location: quanli.php');
                                else 
                                    header('Location: index.php');
            
			}
		}
	}
        }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <fieldset style="width: 300px;    margin: auto; margin-top: 50px;">
            <legend>Form đăng nhập</legend>
            <form method="POST" action="dangnhap.php?act=login">
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
                        <td></td>
                        <td><input type="submit" name="submit1" value="Đăng nhập"></td>
                    </tr>
                </table>
            </form>
            
        </fieldset>
    </body>
</html>
<?php
                        include 'footer.php';
?>