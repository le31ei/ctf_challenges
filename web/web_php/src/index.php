<?php
$p1 = @$_GET['a'];
$p2 = @$_GET['b'];
$p3 = @$_GET['c'];
$p4 = @$_GET['d'];
if(isset($_GET['a']) && isset($_GET['b']) && isset($_GET['c']) && isset($_GET['d']))
	if($p1 != $p2 && md5($p1) == md5($p2)){
		if($p3 === file_get_contents($p4)){
			echo file_get_contents("flag.php");
		}
	}
	else{
		die("请输入2个不同的值");
	}
highlight_file("index.php");