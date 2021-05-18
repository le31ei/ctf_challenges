<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>CTF</title>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta name="format-detection" content="telephone=no, email=no">
    <link rel="stylesheet" href="./stylesheets/flaticon.css" />
    <link rel='stylesheet' href='./stylesheets/style.css' />
</head>
<body>
<?php
    error_reporting(1);
    require_once('config.php');
    $error = "";
    if(isset($_POST['email'])&&isset($_POST['username'])&&isset($_POST['password'])){
        dbconnection();
        $email = mysql_real_escape_string($_POST['email']);
        $username = waf($_POST['username']);
        $password = md5($_POST['password']);
        $sql = "insert into users(email,username,password) values('".$email."','".$username."','".$password."')";
        $res = mysql_query($sql);
        if($res){
            header("Location: login.php");
            exit();
        }

    }


?>
    <header class="pass-header">
        <span class="pass-header-title">CTF</span>
        <div id="userinfo-wraps">
            <div class="glyph-icon flaticon-settings-1">
            </div>
        </div>
    </header>
    <div class="mod-content">
        <form autocomplete="off" method="POST" class="form-wrapper" action=''>
            <div class="img-div">
                <div class="user-img"><img src="./uploads/a.jpeg"></div>
            </div>
            <p class="form-item form-input-wrapper form-item-username form-input-mobile">
                <input type="email" name="email" class="text-input" maxlength="60" placeholder="邮箱" value="" id="login-email">
            </p>
            <p class="form-item form-input-wrapper form-item-username form-input-mobile">
                <input type="text" name="username" class="text-input" maxlength="60" placeholder="用户名" value="" id="login-username">
            </p>
            <p class="form-item form-input-wrapper form-item-password form-input-mobile">
                <input type="password" name="password" class="text-input" id="login-password" placeholder="密码" value="">
            </p>
            <p>
                <input type="submit" value="注册" class="pass-button-full pass-button-full-disabled">
            </p>
        </form>
    </div>
</body>
</html>