<?php


	include("db_config.php");
	if(@$_SESSION["user"]!="panghu")
	{

		//header("Location: admin_login.php"); 
		echo "<script>alert('please login first');window.location.href = 'admin_login.php';</script>";
		die();
	}
	else {
		// "ok";
	}
?>