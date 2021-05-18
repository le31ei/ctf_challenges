<?php
	if(isset($_GET['file'])){
		$file = $_GET['file'];
		if(preg_match("/flag/i", $file)){
			die("我知道你知道了文件位置，但请不要直接获取它");
		}
		if(stripos($file, "index.php") === false){
			include "$file";
		}
		else{
			die("请不要自包含");
		}
	}
	else{
		header("Location: index.php?file=upload.php");
	}
?>
