<?php
include('admin.globl.php');
include('./fckeditor/fckeditor.php') ;
$db->user_shell($_SESSION[uid],$_SESSION[user_shell],2,$_SESSION[times]);

if(isset($_GET[del])){
  if($_GET[del]==data){
$ID_Dele= implode(",",$_POST['lin']);
$db->delete("510_weblink","`id` in (".$ID_Dele.")");
$db->get_admin_msg("link.php","删除成功");
}else{
$db->delete("510_weblink","`id` = $_GET[del]");
$db->get_admin_msg("link.php","删除成功");
}
}
if(isset($_POST[linksubmit])){
if($_GET[id]){
$db->query("UPDATE `510_weblink` SET `w_name` = '$_POST[w_name]',`w_url` = '$_POST[w_url]',`w_introduction` = '$_POST[w_introduction]'," .
		"`w_logo` = '$_POST[w_logo]',`sort` = '$_POST[sort]' WHERE  `id` ='$_GET[id]';");
$db->get_admin_msg("link.php","链接修改成功");
}else{
$db->query("INSERT INTO `510_weblink` (`id`, `w_name`, `w_url`, `w_introduction`, `w_logo`, `sort`) " .
		"VALUES ('', '$_POST[w_name]', '$_POST[w_url]', '$_POST[w_introduction]', '$_POST[w_logo]', '$_POST[sort]');");
$db->get_admin_msg("link.php","成功添加链接");
}

}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK" />
<title>友情链接管理</title>
<link href="Images/css1/css.css" rel="stylesheet" type="text/css">
<SCRIPT language=javascript>
function CheckAll(form)
{
  for (var ii=0;ii<form.elements.length;ii++)
    {
    var e = form.elements[ii];
    if (e.Name != "chkAll")
       e.checked = form.chkAll.checked;
    }
}
function Checked()
{
	var jj = 0
	for(ii=0;ii < document.form.elements.length;ii++){
		if(document.form.elements[ii].name == "lin[]"){
			if(document.form.elements[ii].checked){
				jj++;
			}
		}
	}
	return jj;
}

function DelAll()
{
	if(Checked()  <= 0){
		alert("您至少选择1条信息!");
	}
	else{
		if(confirm("确定要删除选择的信息吗？\n此操作不可以恢复！")){
			form.action="?del=data";
			form.submit();
		}
	}
}


</SCRIPT>
</head>
<body>


<FORM name=form method=post>

  <table class="table" cellspacing="1" cellpadding="2" width="99%" align="center"
border="0">
  <tbody>
    <tr>
<th height="27" colspan="6" align="left" class="bg_tr">友情链接管理|<a href="?link=add">[点击添加友情链接]</a>
</th>
    </tr>

    <tr align="center">
         <td class="td_bg" width="5%">排序</td>
         <td class="td_bg" width="19%" height="26">网站名称</td>
         <td class="td_bg" width="41%" height="">网站网址</td>
	     <td class="td_bg" width="16%" height="26">网站LOGO</td>

		 <td class="td_bg" width="12%">操作</td>
	    <td class="td_bg" width="7%" height=""><input id=chkAll
                  onClick=CheckAll(this.form) type=checkbox
                  value=checkbox name=chkAll></td>
    </tr>


<?php




$sql="SELECT * FROM `510_weblink";

$total=mysql_num_rows(mysql_query($sql));
lwphpclass($total, $pagesize = 5);

$SQL="SELECT * FROM `510_weblink`  order by sort asc, id Desc limit $firstcount,$pagesize";

$query=mysql_query($SQL);
if($total!=0){
    while($row=mysql_fetch_array($query)){
?>
<tr align="center">
<td class="td_bg" width="5%"><?php echo $row[sort] ?></td>
<td class="td_bg" width="19%" height="44"><?php echo $row[w_name] ?></td>
<td class="td_bg" width="41%" height="44"><a href="<?php echo $row[w_url] ?>" target="_blank"><?php echo $row[w_url] ?></a></td>
<td class="td_bg" width="16%" height="44"><img src="<?php echo $row[w_logo] ?>"/></td>

<td class="td_bg" width="12%"><a href="?id=<?php echo $row[id] ?>">编辑</a> <a href="?del=<?php echo $row[id] ?>">删除</a></td>
<td class="td_bg" width="7%" height="44"><input type=checkbox value=<?php echo $row[id] ?> name="lin[]" onClick=Checked(form)></td>
</tr>
<?php
 }
}
  ?>

  <tr>
      <th height="25" colspan="5" align="left" class="bg_tr"> <?php
     echo $pagenav;
     ?></th>
	  <th height="25"  align="right" class="bg_tr">

     <p align="right"><INPUT title=删除 onclick=DelAll() type=button value=删除 name=Submit>
     </th>
  </tr>
</tbody>
</table>
</FORM>
<?php
if(isset($_GET[link])||isset($_GET[id])){
if(isset($_GET[id])&&!empty($_GET[id])){
$sql_edit="SELECT * FROM `510_weblink` where `id`='$_GET[id]'";
$total_edit=mysql_num_rows(mysql_query($sql_edit));
$query_edit=mysql_query($sql_edit);
if($total_edit!=0){
$row_edit=mysql_fetch_array($query_edit);
}
else{
$db->get_admin_msg("link.php","你要修改的友情链不存在请返回");
}
}
?>
<FORM name=formadd method=post>
<table class="table" cellspacing="1" cellpadding="2" width="99%" align="center"
border="0">
    <tbody>
      <tr>
        <th height="27" colspan="2" align="left" class="bg_tr">添加有情链接</th>
      </tr>
      <tr align="left">
        <td class="td_bg" width="12%" height="26">网站名称：</td>
        <td class="td_bg" width="88%" height=""><input name="w_name" type="text" class="input"  value="<?php echo $row_edit[w_name];?>" size="40" /></td>
      </tr>

	  <tr align="left">
        <td class="td_bg" width="12%" height="26">网站网址：</td>
        <td class="td_bg" width="88%" height=""><input name="w_url" type="text" class="input" value="<?php echo $row_edit[w_url];?>" size="40" /></td>
      </tr>

	  <tr align="left">
        <td class="td_bg" width="12%" height="26">网站LOGO：</td>
        <td class="td_bg" width="88%" height=""><input name="w_logo" type="text" class="input"  value="<?php echo $row_edit[w_logo];?>" size="40" /></td>
      </tr>

	  <tr align="left">
        <td class="td_bg" width="12%" height="26">链接排序：</td>
        <td class="td_bg" width="88%" height=""><input name="sort" type="text" class="input"  value="<?php echo $row_edit[sort];?>" size="40" /></td>
      </tr>

	  <tr align="left">
        <td class="td_bg" width="12%" height="25">网站介绍</td>
        <td class="td_bg" width="88%" height="25" valign="top"><input name="w_introduction" type="text" class="input"  value="<?php echo $row_edit[w_introduction];?>" size="40" /></td>
      </tr>

      <tr align="left">
        <td class="td_bg" height="26" colspan="2"><input type="submit" name="linksubmit" value="提交"/></td>

      </tr>



    </tbody>
  </table>


</FORM>


<?php
}

?>
</body>
</html>
