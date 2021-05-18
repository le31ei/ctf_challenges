<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<?php

include("checklogin.php");
$sql = "select * from user_info";  
$result = $db->query($sql);  
  
if ($result)   
{  
    if ($result->num_rows>0)  
    {   echo '<table type="text" align="center" border="1px,solid">';
		echo "<center><h1>所有提交的作业都在这里</h1></center>";
		echo "<tr><td>姓名</td>";
        echo "<td>学号</td>";;
        echo "<td>作业文档(点击查看)</td><BR></tr>";
        while ($rows = $result->fetch_array()) 
        { 

            	echo "<tr><td>".$rows['username']."</td>";
            	echo "<td>".$rows['ids']."</td>";
            	echo "<td><a href='file_checked.php?filename=".urlencode($rows['filename'])."'>".$rows['filename']."</a></td>";
           
		}	
 		echo "<BR></table>";
    }else{  
        echo "<BR>查询结果为空！";     
    }
}else{  
    echo "<BR>查询失败！";   
}
?>
