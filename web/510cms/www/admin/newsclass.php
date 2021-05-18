<?php
include('admin.globl.php');
$db->user_shell($_SESSION[uid],$_SESSION[user_shell],2,$_SESSION[times]);
if(isset($_POST[into_class])){
	$db->query("INSERT INTO `510_newsclass` (`id`, `f_id`, `name`, `sort`)" .
			" VALUES (NULL, '$_POST[f_id]','$_POST[class]', '')");
			$db->get_admin_msg("newsclass.php","添加分类*$_POST[class]*成功");
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK" />
<title>添加新闻分类</title>
<link href="Images/css1/css.css" rel="stylesheet" type="text/css">
</head>
<body>
<table class="table" cellspacing="1" cellpadding="2" width="99%" align="center"
border="0">
  <tbody>
    <tr>
      <th height="25" colspan="2" align="left" class="bg_tr">后台>>添加新闻栏目分类     </th>
    </tr>
  <form action="" method="post" >
    <tr align="center">
      <td class="td_bg" width="46%" height="26">添加分类：
<?php
$query=$db->findall("510_newsclass order by sort asc, id Desc");
while($row=$db->fetch_array($query)){
	$class_arr[] = array($row['id'],$row['name'],$row['f_id'],$row['sort']);
}
?>
	  <select name="f_id">
	  <option value="0">添加大类</option>
<?php
dafenglei_select(0,0,0)
?>
	  </select>
<input name="class" type="text" value=""/><input name="into_class" type="submit" value="添加">
</td>
</form>
</tr>
</tbody>
</table>
<?php
	switch($_GET['action']){
	case 'del':
	$query=$db->findall("510_newsclass where `f_id`='$_GET[id]'");
	if(is_array($roww=$db->fetch_array($query))){
	$db->get_admin_msg("newsclass.php","此栏目下必须为空");
	}else{
	$db->query("DELETE FROM `510_newsclass` WHERE `id` = $_GET[id]");
	$db->get_admin_msg("newsclass.php","删除成功");
    }
    break;
    case 'edit':
	$query=$db->findall("510_newsclass where `id`='$_GET[id]'");
	$row = $db -> fetch_array($query);
	if($row){
?>
<table class="table" cellspacing="1" cellpadding="2" width="99%" align="center" border="0">
<tbody>
    <tr>
      <th class="bg_tr" align="left" colspan="2" height="25">修改新闻分类</th>
</tr>

<form action="?action=act_edit" method="post">


        <tr>
          <td colspan="2"><div align="center"><b>修改分类</b></div></td>
        </tr>
      </thead>
      <tr>
        <td class="bg_tr"><div align="right">分类名称：</div></td>
        <td class="bg_tr"><input name="name" type="text" class="input" id="name" value="<?php echo $row['name'];?>" size="40" /></td>
      </tr>
      <tr>
        <td class="bg_tr"><div align="right">所属分类ID：</div></td>
        <td class="bg_tr"><select name="clid" id="classid">
            <option value="0">-----顶级分类-----</option>
            <?php
            	dafenglei_select(0,0,$row['f_id']);
			?>
          </select>
        </td>
      </tr>
      <tr>
        <td class="bg_tr"><div align="right">排序：</div></td>
        <td class="bg_tr"><input name="sort" type="text" class="input" id="sort" value="<?php echo $row['sort'];?>" size="25" /></td>
      </tr>
      <tr>
        <td colspan="2" class="bg_tr"><div align="center">
            <input type="submit" name="button" id="button" value="修改分类" />
            <input type="hidden" id="id" name="id" value="<?php echo $_GET['id'];?>" />
            <input type="reset" name="button2" id="button2" value="重置" />
          </div></td>
      </tr>

  </form>

        </tr>

</tbody>
</table>



<?php
	}else{
		echo $db->get_admin_msg("newsclass.php","你要操作的分类不存在");
	}
  break;
  case 'act_edit':
		$query=$db->findall("510_newsclass where `id`='$_POST[id]'");
	    $row = $db -> fetch_array($query);
		if($row){
			if($row['id']==$_POST['clid']){
				echo $db->get_admin_msg("newsclass.php","修改失败，不能为自己的子类");
			}else{
				$sql = "update `510_newsclass` set `name`='".$_POST['name']."',`f_id`=".$_POST['clid'];
				$sql .= ",`sort`=".$_POST['sort']." where `id`=".$_POST['id'];
				$db -> query($sql);
				echo $db->get_admin_msg("newsclass.php","修改成功！");
			}
		}
		break;







  case '':
?>
<table class="table" cellspacing="1" cellpadding="2" width="99%" align="center" border="0">
<tbody>
    <tr>
      <th class="bg_tr" align="left" colspan="3" height="25">新闻分类列表</th>
    </tr>
       <tr align="center">
          <td width="833" bgcolor=""><b>分类名称</b></td>
          <td width="63" bgcolor=""><b>排序</b></td>
          <td width="115" bgcolor=""><b>操作</b></td>
        </tr>

 <?php dafenglei_arr(0,0);?>
</tbody>
</table>

<?php

    break;

	}


?>





<?php
function dafenglei_select($m,$id,$index)
{
	global $class_arr;
    $n = str_pad('',$m,'-',STR_PAD_RIGHT);
	$n = str_replace("-","&nbsp;&nbsp;",$n);
	for($i=0;$i<count($class_arr);$i++)
	{

		if($class_arr[$i][2]==$id)
		{
			if($class_arr[$i][0]==$index){
				echo "        <option value=\"".$class_arr[$i][0]."\" selected=\"selected\">".$n."|--".$class_arr[$i][1]."</option>\n";
			}else{
				echo "        <option value=\"".$class_arr[$i][0]."\">".$n."|--".$class_arr[$i][1]."</option>\n";
			}
			dafenglei_select($m+1,$class_arr[$i][0],$index);

		}

	}

}

function dafenglei_arr($m,$id)
{
	global $class_arr;
	global $classid;
	global $mysql;
	if($id=="") $id=0;
	$n = str_pad('',$m,'-',STR_PAD_RIGHT);
	$n = str_replace("-","&nbsp;&nbsp;",$n);
	for($i=0;$i<count($class_arr);$i++){
		if($class_arr[$i][2]==$id){
		echo "<tr>\n";
		echo "	  <td class=\"td_bg\">".$n."|--<a href=\"?action=edit&amp;id=".$class_arr[$i][0]."\">".$class_arr[$i][1]."</a></td>\n";
		echo "	  <td class=\"td_bg\"><div align=\"center\">".$class_arr[$i][3]."</div></td>\n";
		echo "	  <td class=\"td_bg\"><div align=\"center\"><a href=\"?action=edit&amp;id=".$class_arr[$i][0]."\">修改</a>";
		echo " <a href=\"?action=del&amp;id=".$class_arr[$i][0]."\">删除</a>";
		echo "</div></td>\n";
		echo "	</tr>\n";
			dafenglei_arr($m+1,$class_arr[$i][0]);
		}

	}

}
?>











</body>
</html>
