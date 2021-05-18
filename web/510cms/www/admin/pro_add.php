<?php
include('admin.globl.php');
$db->user_shell($_SESSION[uid],$_SESSION[user_shell],2,$_SESSION[times]);
if(isset($_POST['proadd'])){
	if($_POST[cid]!=0){
$_POST[introduction]=htmlto($_POST[introduction]);
$db->query("INSERT INTO `510_procut` (`id`, `cid`, `name`, `model`,`introduction`,`parameter`,`pic_1`,`pic_2`,`pic_3`,`date_time`) " .
	"VALUES ('', '$_POST[cid]', '$_POST[name]', '$_POST[model]','$_POST[introduction]','$_POST[con]','$_POST[pic_1]','$_POST[pic_2]','$_POST[pic_3]',".mktime().");");
$db->get_admin_msg("pro_add.php","成功添加信息");
	}
	else $db->get_admin_msg("pro_add.php","请选择分类");
}


function htmlto($linda){
	str_replace("\n","<br>",str_replace(" ","&nbsp;",$linda));
	return $linda;
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

</head>
<body>
<table class="table" cellspacing="1" cellpadding="2" width="99%" align="center"
border="0">
  <tbody>
    <tr>
      <th height="25" colspan="3" align="left" class="bg_tr">后台>>添加产品 </th>
    </tr>
    <?php
$query=$db->findall("510_proclass order by sort asc, id Desc");
while($row=$db->fetch_array($query)){
	$class_arr[] = array($row['id'],$row['name'],$row['f_id'],$row['sort']);
}
?>
  <form action="" method="post" name="form" id="xm">
    <tr>
      <td class="td_bg" width="8%">选择分类：</td>
      <td class="td_bg" height="26" colspan="2"><select name="cid">
        <option value="?">请选择栏目</option>
        <?php
dafenglei_select(0,0,0)
?>
      </select></td>
    </tr>
 <tr>
      <td class="td_bg" width="8%">产品名称：</td>
      <td class="td_bg" height="26" colspan="2"><input type="text" name="name" value="" size="30"/></td>
    </tr>
    <tr>
      <td class="td_bg" width="8%">产品型号：</td>
      <td class="td_bg" height="26" colspan="2"><input type="text" name="model" value="" size="30" /></td>
    </tr>
    <tr>
      <td class="td_bg" width="8%">产品图片一：</td>
      <td class="td_bg" width="21%" height="26"><input type="text" name="pic_1" id="pic_1" value="" size="30" /></td>
      <td class="td_bg" width="71%" height="26"><iframe border=0 frameborder=0 framespacing=0 height=22 width=600 marginheight=0 marginwidth=0  scrolling=no  src="uppic.php?id=pic_1" ></iframe></td>
    </tr>
    <tr>
      <td class="td_bg" width="8%">产品图片二：</td>
      <td class="td_bg" width="21%" height="26" ><input type="text" name="pic_2" id="pic_2" value="" size="30" /></td>
      <td class="td_bg" width="71%" height="26"><iframe border=0 frameborder=0 framespacing=0 height=22 width=600 marginheight=0 marginwidth=0 scrolling=no  src="uppic.php?id=pic_2" ></iframe></td>
    </tr>
    <tr>
      <td class="td_bg" width="8%">产品图片三：</td>
      <td class="td_bg" width="21%" height="26"><input type="text" name="pic_3" id="pic_3" value="" size="30" /></td>
      <td class="td_bg" width="71%" height="26"><iframe border=0 frameborder=0 framespacing=0 height=22 width=600 marginheight=0 marginwidth=0  scrolling=no  src="uppic.php?id=pic_3" ></iframe></td>
    </tr>
    <tr>
      <td class="td_bg" width="8%">产品介绍：</td>
      <td class="td_bg" height="26" colspan="2"><textarea name="introduction" cols="80" rows="8"></textarea></td>
    </tr>
    <tr>
      <td class="td_bg" width="8%">详细参数：</td>
      <td class="td_bg" height="26" colspan="2"><?php
include('./fckeditor/fckeditor.php') ;
$sBasePath = $_SERVER['PHP_SELF'] ;
$sBasePath = dirname($sBasePath).'/fckeditor/';
$aFCKeditor = new FCKeditor('con') ;
$aFCKeditor->BasePath=$sBasePath;
$aFCKeditor->Create();
?></td>
    </tr>
    <tr>
      <td class="td_bg" width="8%">&nbsp;</td>
      <td class="td_bg" height="26" colspan="2"><input type="submit" name="proadd" value="添加产品"  /></td>
    </tr>
  </form>
  <tr>
    <td>
</table>
</body>
</html>
