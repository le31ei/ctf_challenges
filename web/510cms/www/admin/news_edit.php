<?php
include('admin.globl.php');
include('./fckeditor/fckeditor.php') ;
$db->user_shell($_SESSION[uid],$_SESSION[user_shell],2,$_SESSION[times]);
if(isset($_GET[id])&&!empty($_GET[id])){
$edit_id=$_GET[id];
$query=$db->select("510_newbase","","where `id`=$edit_id");
$row_edit=$db->fetch_array($query);
$query=$db->select("510_newscontent","","where `nid`=$edit_id");
$row_editcon=$db->fetch_array($query);
}else{
	$db->get_admin_msg("news_list.php","请选择你要修改的新闻");
}

if(isset($_POST['newsedit'])){
	if($_POST[f_id]!=0){
$db->query("UPDATE `510_newbase` SET `cid` = '$_POST[f_id]',`author` = '$_POST[author]',`title` = '$_POST[title]' WHERE  `id` ='$edit_id';");
$db->query("UPDATE `510_newscontent` SET `content`='$_POST[con]' where `nid`=$edit_id");
$db->get_admin_msg("news_list.php","修改成功");
	}
	else $db->get_admin_msg("news_edit.php?id=$edit_id","请选择分类");
}






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
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK" />
<title>添加新闻</title>
<link href="Images/css1/css.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function view1(url){
var url; window.open(url,'_blank','status=no,top=50,left=300,width=460,height=150');
}
</script>
</head>
<body>
<table class="table" cellspacing="1" cellpadding="2" width="99%" align="center"
border="0">
  <tbody>
    <tr>
      <th height="25" colspan="3" align="left" class="bg_tr">后台>>修改新闻     </th>
    </tr>
<?php
$query=$db->findall("510_newsclass order by sort asc, id Desc");
while($row=$db->fetch_array($query)){
	$class_arr[] = array($row['id'],$row['name'],$row['f_id'],$row['sort']);
}
?>
  <form action="" method="post" name="form" id="xm">
    <tr>
      <td class="td_bg" width="9%">选择分类：</td>
      <td class="td_bg" width="91%" height="26"><select name="f_id">
	  <option value="?">请选择栏目</option>
<?php
dafenglei_select(0,0,$row_edit[cid])
?>
	  </select></td>
</tr>

<tr>
  <td class="td_bg" width="9%">新闻标题：</td>
<td class="td_bg" width="91%" height="26"><input type="text" name="title" value="<?php echo $row_edit[title];?>" size="30"/></td>
</tr>



<tr>
  <td class="td_bg" width="9%">新闻作者：</td>
<td class="td_bg" width="91%" height="26"><input type="text" name="author" value="<?php echo $row_edit[author];?>" size="20" /></td>
</tr>



<tr>
  <td class="td_bg" width="9%">新闻内容：</td>
<td class="td_bg" width="91%" height="26"><?php
$sBasePath = $_SERVER['PHP_SELF'] ;
$sBasePath = dirname($sBasePath).'/fckeditor/';
$aFCKeditor = new FCKeditor('con') ;
$aFCKeditor->BasePath=$sBasePath;
$aFCKeditor->Value=$row_editcon[content];
$aFCKeditor->Create();
?></td>
</tr>
<tr>
  <td class="td_bg" width="9%">&nbsp;</td>
<td class="td_bg" width="91%" height="26">
  <input type="submit" name="newsedit" value="提交修改"  /></td>
</tr>
</form>
<tr>
  <td>
  </tbody>
</table>




















</body>
</html>
