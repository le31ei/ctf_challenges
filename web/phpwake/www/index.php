<?php
error_reporting(0);
include('flag.php');
if (!isset($_GET['flag'])){
	show_source(__FILE__);
	exit();
}
if (strcmp($_GET['flag'], $flag) == 0) {
echo "success, flag:" . $flag;
}
?>