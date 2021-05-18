<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<?php
		include("checklogin.php");
		$filename = addslashes($_GET['filename']);
		$filename2 = str_ireplace("./uploads/","",$filename);//数据库删除的文件名
		$filename = str_ireplace("..","",stripcslashes($filename));
		if(!unlink($filename))
			{
				echo $filename."删除失败";
			}
			else
			{
				$db->query("delete from user_info where filename='$filename2'");
				echo "删除成功";
			}