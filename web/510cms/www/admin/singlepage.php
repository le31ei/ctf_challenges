<?php
include('admin.globl.php');
include('./fckeditor/fckeditor.php') ;
$db->user_shell($_SESSION[uid],$_SESSION[user_shell],2,$_SESSION[times]);

if(isset($_GET[del])){
  if($_GET[del]==data){
$ID_Dele= implode(",",$_POST['lin']);
$db->delete("510_single","`id` in (".$ID_Dele.")");
$db->get_admin_msg("singlepage.php","删除成功");
}else{
$db->delete("510_single","`id` = $_GET[del]");
$db->get_admin_msg("singlepage.php","删除成功");
}
}
if(isset($_POST[linksubmit])){
if($_GET[id]){
$db->query("UPDATE `510_single` SET `title` = '$_POST[title]',`content` = '$_POST[con]',`type_id` = '$_POST[type_id]',`sort` = '$_POST[sort]',`remark` = '$_POST[remark]' WHERE  `id` ='$_GET[id]';");
$db->get_admin_msg("singlepage.php","模块修改成功");
}else{
$db->query("INSERT INTO `510_single` (`id`,`type_id` ,`title` ,`content` ,`remark`,`sort` ,`date` )" .
		"VALUES ('', '$_POST[type_id]' , '$_POST[title]', '$_POST[con]', '$_POST[remark]', '$_POST[sort]', '".mktime()."');");
$db->get_admin_msg("singlepage.php","成功添加模块");
}

}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK" />
<title>单页模块管理</title>
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
<th height="27" colspan="8" align="left" class="bg_tr">单页模块管理|<a href="?link=add">[点击添加模块]</a>
</th>
    </tr>

    <tr align="center">
         <td class="td_bg" width="2%">ID</td>
		 <td class="td_bg" width="6%">模块排序</td>
		 <td class="td_bg" width="7%">模块类型ID</td>

         <td class="td_bg" width="22%" height="26">模块名称</td>
         <td class="td_bg" width="37%" height="26">模块说明</td>
	     <td class="td_bg" width="10%" height="26">日期</td>

		 <td class="td_bg" width="10%">操作</td>
	    <td class="td_bg" width="6%" height=""><input id=chkAll
                  onClick=CheckAll(this.form) type=checkbox
                  value=checkbox name=chkAll></td>
    </tr>


<?php




$sql="SELECT * FROM `510_single";

$total=mysql_num_rows(mysql_query($sql));
lwphpclass($total, $pagesize = 5);

$SQL="SELECT * FROM `510_single`  order by `type_id` asc, `sort` asc limit $firstcount,$pagesize";

$query=mysql_query($SQL);
if($total!=0){
while($row=mysql_fetch_array($query)){
?>
<tr align="center">
<td class="td_bg" width="2%"><?php echo $row[id] ?></td>
<td class="td_bg" width="6%"><?php echo $row[sort] ?></td>
<td class="td_bg" width="7%"><?php echo $row[type_id] ?></td>
<td class="td_bg" width="22%" height="28" align="left"><?php echo $row[title] ?></td>
<td class="td_bg" width="37%" height="28" align="left"><?php echo $row[remark] ?></td>
<td class="td_bg" width="10%" height="28"><?php echo date("Y-m-d",$row[date]) ?></a></td>
<td class="td_bg" width="10%"><a href="?id=<?php echo $row[id] ?>">编辑</a> <a href="?del=<?php echo $row[id] ?>">删除</a></td>
<td class="td_bg" width="6%" height="28"><input type=checkbox value=<?php echo $row[id] ?> name="lin[]" onClick=Checked(form)></td>
</tr>
<?php
 }
}
  ?>

  <tr>
      <th height="25" colspan="7" align="left" class="bg_tr"> <?php
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
$sql_edit="SELECT * FROM `510_single` where `id`='$_GET[id]' ";
$total_edit=mysql_num_rows(mysql_query($sql_edit));
$query_edit=mysql_query($sql_edit);
if($total_edit!=0){
$row_edit=mysql_fetch_array($query_edit);
}
else{
$db->get_admin_msg("singlepage.php","你要修改的友情链不存在请返回");
}
}
?>
<FORM name=formadd method=post>
  <table class="table" cellspacing="1" cellpadding="2" width="99%" align="center"
border="0">
    <tbody>
      <tr>
        <th height="27" colspan="2" align="left" class="bg_tr">添加单模版面板</th>
      </tr>
      <tr align="left">
        <td class="td_bg" width="12%" height="26">模块类型ID：</td>
        <td class="td_bg" width="88%" height=""><input name="type_id" type="text" class="input"  value="<?php echo $row_edit[type_id];?>" size="5" />
          这里可以自定义类型标示符如1、2、3或A、B、C，所添加的相同类型的模块为一个目录。</td>
      </tr>
      <tr align="left">
        <td class="td_bg" width="12%" height="26">模块排序：</td>
        <td class="td_bg" width="88%" height=""><input name="sort" type="text" class="input"  value="<?php echo $row_edit[sort];?>" size="5" />
          填写这里可以对不同模块或同模块内的子模块进行排序。</td>
      </tr>
      <tr align="left">
        <td class="td_bg" width="12%" height="26">模块名称：</td>
        <td class="td_bg" width="88%" height=""><input name="title" type="text" class="input"  value="<?php echo $row_edit[title];?>" size="40" /></td>
      </tr>
      <tr align="left">
        <td class="td_bg" width="12%" height="26">模块说明：</td>
        <td class="td_bg" width="88%" height=""><input name="remark" type="text" class="input"  value="<?php echo $row_edit[remark];?>" size="40" />
          这里对模板进行说，以应模块类型标示符，便于记忆。</td>
      </tr>
      <tr align="left">
        <td class="td_bg" width="12%" height="26">模块内容：</td>
        <td class="td_bg" width="88%" height=""><?php
$sBasePath = $_SERVER['PHP_SELF'] ;
$sBasePath = dirname($sBasePath).'/fckeditor/';
$aFCKeditor = new FCKeditor('con') ;
$aFCKeditor->BasePath=$sBasePath;
$aFCKeditor->Value=$row_edit[content];
$aFCKeditor->Create();
?></td>
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
