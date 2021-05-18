<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>XSS game</title>
</head>
<body>
    <form method="POST" action="">
        <input name='content' type='text' /><br><br>
        <input type='submit' value="留言"/>
    </form>
    <br>
<?php
error_reporting(0);
$dbhost = 'mysql';
$dbuser = 'xss';
$dbpass = 'xss';
$db = mysqli_connect($dbhost, $dbuser, $dbpass);
mysqli_select_db($db, 'xss');
mysqli_query($db, 'set NAMES utf8');
if (!$db){
    die('Could not connect: ' . mysql_error());
}

if(isset($_POST['content'])){
    $content = $_POST['content'];
    $sql = "INSERT INTO text(text) VALUES ('".$content."')";
    mysqli_query($db, $sql);
}
?>
</body>
</html>
