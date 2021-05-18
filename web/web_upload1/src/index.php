<?php
	if(isset($_FILES['userfile'])){
		if($_FILES['userfile']['type'] != "image/gif"){
			echo "Sorry, we only allow uploading GIF images";
			exit;
		}
		$uploaddir = 'uploads/';
		$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
		if (move_uploaded_file($_FILES['userfile']['tmp_name'],$uploadfile)){
			echo "File is valid, and was successfully uploaded.<br>" . $uploadfile;
		} 
		else {
			echo "File uploading failed.\n";
		}
	}
?>

<html>
<head>
	<meta charset="utf-8">
</head>

<body>
	<form action="" method="POST" enctype="multipart/form-data">
		<input type="file" name="userfile" value="" />
		<input type="submit" name="submit" value="上传" />
</body>

</html>
