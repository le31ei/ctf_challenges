<?php  
	include("db_config.php");

	$name = @addslashes($_POST[name]);//get name
	$ids =  @addslashes($_POST[ids]);//get ids
	$message = @addslashes($_POST[message]);//get message


	if (@$_FILES["file"]["error"] > 0)
  	{
  		echo "upload failed!";
  	}
	else
 	{		$filename = @addslashes($_FILES[ 'file' ][ 'name' ]);
    		$target_path  = "./uploads/"; 
    		if (!is_dir($target_path)){
            	mkdir($target_path);
        	}

        	$rel_file = rand(10,100).basename(@$_FILES[ 'file' ][ 'name' ] ); 

    		$target_path .= $rel_file;
    		if(@$_POST['submit'])
    		{
				if(pathinfo(@$_FILES[ 'file' ][ 'name' ])['extension']!="doc")
				{
					echo "只支持上传doc文件,别想着getshell了！";
				}
				else
				{
					if(!move_uploaded_file(@$_FILES[ 'file' ][ 'tmp_name' ], $target_path ))
					{
						echo "未知上传错误";
					}
					else
					{	$rel_file = addslashes($rel_file);
						echo "资料提交成功,路径为：".$target_path;
					}
					$sql = "INSERT INTO `user_info` (`username`, `ids`, `message`, `filename`) VALUES ('$name', '$ids', '$message', '$rel_file')";
					$db->query($sql);
				}
		}

  
  	}

?>
<html>
	<body>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<center>
			<h1>提交作业 </h1>

				<form action="" method="post" enctype="multipart/form-data">
           		<table type="text" align="center" border="1px,solid">
           			<tr>
               		<td>姓名</td>
               		<td><input type="text" name="name" id="name"/></td>
           			</tr>
            		<tr>
                	<td>编号</td>
                	<td><input type="text" name="ids" id="ids"/> </td>
            		</tr>
            		<tr>
                	<td>备注</td>
                	<td><textarea name="message" id="message" cols="60" role="15"></textarea></td>
           			</tr>

           			 <tr>
                	<td>作业(只支持word文件</td>
                	<td><input type="file" name="file" id="file" /> </td></br>
           			</tr>
                		<td>
                		<input type="submit" name="submit" value="提交" />
						<input type="reset" name="reset"/>
						</td>          		          	
           		</table>
           		
           		
       		</form>

		</center>
	</body>
</html>

