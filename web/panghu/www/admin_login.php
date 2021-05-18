<?php
   include("db_config.php");
   ob_start();
   $username = @addslashes($_POST['username']);
   $password = @addslashes($_POST['password']);
   if(isset($_POST["login"]))
   {
        if(@$_POST['username']!=addslashes(@$_POST['username']))
        {
            echo "你还想注入我胖虎?";
        }
        else if(@$_POST['username']=="" || @$_POST['password']=="")
        {
            echo "别留空";
        }
        else
        {
             $sql = "SELECT * from admin_info where admin_username = '$username' and  admin_password = '$password'";
            $rs=$db->query($sql);
            $row = $rs-> fetch_array(); 
 
            if($row['admin_username']== $username&& $row['admin_password']==$password)
            {
                echo $row['admin_username']."登陆成功!";
                $_SESSION["user"]=$row['admin_username'];
               header("Location: admin_manage.php"); 
            }
            else if(is_null($row))
            { 
                echo "登录失败";
            }
        
        }
    }
?>
<html>
	<body>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<center>
			<h1>后台管理系统 </h1>

				<form action="" method="post">
                <label>管理账号</label>
                <input type="text" name="username">
                </br>
                <label>管理密码</label>
                <input type="password" name="password">
                </br>
                <input type="submit" name="login" value="登录">
       		</form>

		</center>
	</body>
</html>


    