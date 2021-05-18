<?php
include('admin.globl.php');
$db->user_shell($_SESSION[uid],$_SESSION[user_shell],2,$_SESSION[times]);
if(isset($_POST[into_class])){
	$db->query("INSERT INTO `510_proclass` (`id`, `f_id`, `name`, `sort`, `cidpic`, `remark`)" .
			" VALUES (NULL, '$_POST[f_id]','$_POST[class]', '','$_POST[cidpic]','$_POST[remark]')");
			$db->get_admin_msg("proclass.php","添加分类*$_POST[class]*成功");
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
      <th height="25" colspan="2" align="left" class="bg_tr">后台>>商品分类管理     </th>
    </tr>
  <form action="" method="post" >

 <tr>
      <td height="25" colspan="2" align="left" class="td_bg" valign="middle">分类图标：&nbsp;<input name="cidpic" type="text"  value="" size="20" /></td>
    </tr>

 <tr>
      <td height="25" colspan="2" align="left" class="td_bg" valign="middle">分类说明：&nbsp;<input name="remark" type="text"  value="" size="20" /></td>
    </tr>

    <tr >
      <td class="td_bg" width="46%" height="26">添加分类：
<?php
$query=$db->findall("510_proclass order by sort asc, id Desc");
while($row=$db->fetch_array($query)){
	$class_arr[] = array($row['id'],$row['name'],$row['f_id'],$row['sort'],$row['cidpic'],$row['remark']);
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
	$query=$db->findall("510_proclass where `f_id`='$_GET[id]'");
	if(is_array($roww=$db->fetch_array($query))){
	$db->get_admin_msg("proclass.php","此栏目下必须为空");
	}else{
	$db->query("DELETE FROM `510_proclass` WHERE `id` = $_GET[id]");
	$db->get_admin_msg("proclass.php","删除成功");
    }
    break;
    case 'edit':
	$query=$db->findall("510_proclass where `id`='$_GET[id]'");
	$row = $db -> fetch_array($query);
	if($row){

?>
<table class="table" cellspacing="1" cellpadding="2" width="99%" align="center" border="0">
          <tbody>
            <tr>
              <th class="bg_tr" align="left" colspan="2" height="25">产品分类修改</th>
            </tr>
          <form action="?action=act_edit" method="post">
            <tr>
              <td colspan="2"><div align="center"><b>修改分类</b></div></td>
            </tr>
            <tr>
              <td class="bg_tr"><div align="right">分类名称：</div></td>
              <td class="bg_tr"><input name="name" type="text" class="input" id="name" value="<?php echo $row['name'];?>" size="40" /></td>
            </tr>
			<tr>
              <td class="bg_tr"><div align="right">分类图标：</div></td>
              <td class="bg_tr"><input name="cidpic" type="text" class="input" id="cidpic" value="<?php echo $row['cidpic'];?>" size="40" /></td>
            </tr>
			<tr>
              <td class="bg_tr"><div align="right">分类说明：</div></td>
              <td class="bg_tr"><input name="remark" type="text" class="input" id="remark" value="<?php echo $row['remark'];?>" size="40" /></td>
            </tr>
            <tr>
              <td class="bg_tr"><div align="right">所属分类ID：</div></td>
              <td class="bg_tr"><select name="clid" id="classid">
                  <option value="0">-----顶级分类-----</option>
                  <?php
            	dafenglei_select(0,0,$row['f_id']);
			?>
                </select>              </td>
            </tr>
            <tr>
              <td class="bg_tr"><div align="right">排序：</div></td>
              <td class="bg_tr"><input name="sort" type="text" class="input" id="sort" value="<?php echo $row['sort'];?>" size="25" /></td>
            </tr>
            <tr>
              <td colspan="2" class="bg_tr"><div align="center">
                  <input type="submit" name="button" id="button" value="修改分类" />
                  <input type="hidden" id="id" name="id" value="<?php echo $row['id'];?>" />
                  <input type="reset" name="button2" id="button2" value="重置" />
              </div></td>
            </tr>
          </form>
</table>




<?php
	}else{
		echo $db->get_admin_msg("proclass.php","你要操作的分类不存在");
	}
  break;
  case 'act_edit':
		$query=$db->findall("510_proclass where `id`='$_POST[id]'");
	    $row = $db -> fetch_array($query);
		if($row){
			if($row['id']==$_POST['clid']){
				echo $db->get_admin_msg("proclass.php","修改失败，不能为自己的子类");
			}else{
				$sql = "update `510_proclass` set `name`='".$_POST['name']."',`f_id`=".$_POST['clid'];
				$sql .= ",`sort`=".$_POST['sort'].",`cidpic`='".$_POST['cidpic']."',`remark`='".$_POST['remark']."' where `id`=".$_POST['id'];
				$db -> query($sql);
				echo $db->get_admin_msg("proclass.php","修改成功！");
			}
		}
		break;


  case '':
?>
<table class="table" cellspacing="1" cellpadding="2" width="99%" align="center" border="0">
  <tbody>
    <tr>
      <th class="bg_tr" align="left" colspan="5" height="25">产品分类列表
        </th>
    </tr>
    <tr align="center">
      <td width="306" bgcolor=""><b>分类名称</b></td>
	   <td width="249" bgcolor=""><b>分类图标</b></td>
	    <td width="276" bgcolor=""><b>分类说明</b></td>
      <td width="46" bgcolor=""><b>排序</b></td>
      <td width="107" bgcolor=""><b>操作</b></td>
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
		echo "	  <td class=\"td_bg\"><div align=\"center\">".$class_arr[$i][4]."</div></td>\n";
		echo "	  <td class=\"td_bg\"><div align=\"center\">".$class_arr[$i][5]."</div></td>\n";
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
