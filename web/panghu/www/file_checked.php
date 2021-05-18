<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<?php
		include("checklogin.php");


		$filename = filter(@$_GET['filename']);
		$rel_name = "/uploads/".$filename;
		$down_name = str_ireplace("+",' ',"./uploads/".urlencode($filename));
		if(file_exists(dirname(__FILE__).$rel_name))
		{
			$sql = "select message from user_info where filename='$filename'";
			//die($sql);
			$result = $db->query($sql);  
			$row = $result-> fetch_array(); 
			echo "<center><h1>$filename</h1></center>";

        	echo "<center><label>备注信息:</label><textarea  cols='60' role='20'>".$row[0]."</textarea></center><br>";
        	echo "<center><a href='$down_name'>下载查看</a></center><br>";
        	echo "<center><a href='file_deleted.php?filename=$down_name'>删除文件(如果拿到flag记得删除payload文件哦,不然要被别人看到)</a></center><br>";
		}
		else{
			echo "想看作业文件起码作业文件得存在吧".$rel_name."  你确定存在？？？";
		}