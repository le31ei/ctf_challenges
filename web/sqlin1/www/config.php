<?php 
$dbhost="db";

$dbuser="sqli";
$dbpasswd="sqli";
$db="sqli";

$conn=mysqli_connect($dbhost,$dbuser,$dbpasswd,$db) or die ("数据库连接出错");
$conn->query("set names utf-8");

?>