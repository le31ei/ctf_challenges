<?php
error_reporting(0);
session_start();
$mysql_server="db";
$mysql_username="panghu";
$mysql_password="panghu404";
$mysql_database="file_sqli";
function filter($str)
{
			$str = str_ireplace("union", "", $str);
			$str = str_ireplace("select", "", $str);
			$str = str_ireplace("#", "", $str);
			$str = str_ireplace("--", "", $str);
			return $str;

}
$db=new mysqli($mysql_server,$mysql_username,$mysql_password,$mysql_database);
if(mysqli_connect_error()){
	echo 'Could not connect to database.';
	exit;
}
