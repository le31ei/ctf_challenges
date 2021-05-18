<?php
include('admin.globl.php');
include('./fckeditor/fckeditor.php') ;
$db->user_shell($_SESSION[uid],$_SESSION[user_shell],2,$_SESSION[times]);
if(isset($_POST['newsadd'])){
	if($_POST[f_id]!=0){
$db->query("INSERT INTO `510_newbase` (`id`, `cid`, `title`, `author`, `date_time`)" .
			" VALUES (NULL, '$_POST[f_id]', '$_POST[title]', '$_POST[author]', '".mktime()."')");
			$lastID=$db->insert_id();
$db->query("INSERT INTO `510_newscontent` (`nid`, `keyword`, `content`, `remark`) " .
		"VALUES ('$lastID', '', '$_POST[con]', '');");
$db->get_admin_msg("news_add.php","成功添加信息");
	}
	else $db->get_admin_msg("news_add.php","请选择分类");
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
      <th height="25" colspan="3" align="left" class="bg_tr">后台>>添加新闻     </th>
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
dafenglei_select(0,0,0)
?>
	  </select></td>
</tr>

<tr>
  <td class="td_bg" width="9%">新闻标题：</td>
<td class="td_bg" width="91%" height="26"><input type="text" name="title" value="" size="30"/></td>
</tr>



<tr>
  <td class="td_bg" width="9%">新闻作者：</td>
<td class="td_bg" width="91%" height="26"><input type="text" name="author" value="" size="20" /></td>
</tr>



<tr>
  <td class="td_bg" width="9%">新闻内容：</td>
<td class="td_bg" width="91%" height="26"><?php
$sBasePath = $_SERVER['PHP_SELF'] ;
$sBasePath = dirname($sBasePath).'/fckeditor/';
$aFCKeditor = new FCKeditor('con') ;
$aFCKeditor->BasePath=$sBasePath;
$aFCKeditor->Create();
?></td>
</tr>
<tr>
  <td class="td_bg" width="9%">&nbsp;</td>
<td class="td_bg" width="91%" height="26">
  <input type="submit" name="newsadd" value="添加新闻"  /></td>
</tr>
</form>
<tr>
  <td>
  </tbody>
</table>




















</body>
</html>
