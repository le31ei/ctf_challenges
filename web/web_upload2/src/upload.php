<?php
	if(isset($_FILES['upfile'])){
		$uploaddir = 'uploads/';
		$uploadfile = $uploaddir . basename($_FILES['upfile']['name']);
		$ext = pathinfo($_FILES['upfile']['name'],PATHINFO_EXTENSION);

		//检查文件内容
		$text = file_get_contents($_FILES['upfile']['tmp_name']);


		echo $ext;

		//检查文件后缀
		if (!preg_match("/ph.|htaccess/i", $ext)){

			if(preg_match("/<\?php/i", $text)){
				echo "你的文件内容有恶意代码<br>";
			}
			else{
				move_uploaded_file($_FILES['upfile']['tmp_name'],$uploadfile);
				echo "上传成功<br>路径为:" . $uploadfile . "<br>";
			}
		} 
		else {
			echo "恶意后缀<br>";
			
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>上传文件</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
	请不要上传php脚本哟
	<form action="upload.php" method="POST" enctype="multipart/form-data">
		<input type="file" name="upfile" value="" />
		<input type="submit" name="submit" value="提交" />
	</form>
</body>
</html>