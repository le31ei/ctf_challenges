<?php
error_reporting(0);
$dbhost = 'mysql';
$dbuser = 'xss';
$dbpass = 'xss';
$db = mysqli_connect($dbhost, $dbuser, $dbpass);
mysqli_select_db($db, 'xss');
mysqli_query($db, 'set NAMES utf8');
if(!$db){
    die("connect wrong");
}
if(isset($_POST['username']) && isset($_POST['password'])){
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);
    $sql = "SELECT password FROM user WHERE username='$username'";
    $result = mysqli_query($db,$sql);
    $ans = mysqli_fetch_assoc($result);
    if($password === $ans['password']){
        setcookie("flag","NSCTF{1436d30d970974a13d9e2c07808c4931}");
        header("Location: mi04dmin.php");
    }
}

if($_COOKIE['flag'] === 'NSCTF{1436d30d970974a13d9e2c07808c4931}'){
    $sql = "SELECT * FROM text";
    $result = mysqli_query($db, $sql);
    while($ans = mysqli_fetch_assoc($result)){
        echo $ans["text"] . "<br>";
        $t = $ans["text"];
        //$sql_delete = "DELETE FROM text where text='$t'";
        //$result = mysqli_query($db, $sql_delete);
    }
    die();
}

?>

<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="username" />
        <input type="password" name="password" />
        <input type="submit" name="submit" value="login" />
    </form>
</body>
</html>
