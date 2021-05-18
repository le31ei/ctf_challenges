<?php
include('admin.globl.php');
$db->user_shell($_SESSION[uid],$_SESSION[user_shell],1,$_SESSION[times]);
if(isset($_GET[del])){
  if($_GET[del]==data){
$ID_Dele= implode(",",$_POST['lin']);
$db->delete("510_admin","`id` in (".$ID_Dele.")");
$db->get_admin_msg("adminadd.php","删除成功");
}else{
$db->delete("510_admin","`id` = $_GET[del]");
$db->get_admin_msg("adminadd.php","删除成功");
}
}
if(isset($_POST[adminsubmit])){
if($_POST[mid]==1||$_POST[mid]==2){

if($_GET[id]){
	if(empty($_POST[passwd])){
$db->query("UPDATE `510_admin` SET `mid` = '$_POST[mid]',`name` = '$_POST[name]'," .
		"`remark` = '$_POST[remark]' WHERE  `id` ='$_GET[id]';");
	}else{
$newps=md5($_POST[passwd].ALL_PS);
$db->query("UPDATE `510_admin` SET `mid` = '$_POST[mid]',`name` = '$_POST[name]',`passwd` = '$newps'," .
		"`remark` = '$_POST[remark]' WHERE  `id` ='$_GET[id]';");
	}

$db->get_admin_msg("adminadd.php","管理员账号修改成功");
}else{
$newps=md5($_POST[passwd].ALL_PS);
$db->query("INSERT INTO `510_admin` (`id`, `mid`, `name`, `passwd`, `remark`) " .
		"VALUES ('', '$_POST[mid]', '$_POST[name]', '$newps', '$_POST[remark]');");
$db->get_admin_msg("adminadd.php","管理员账号添加成功");
}
}
else{
	$db->get_admin_msg("adminadd.php","操作失败管理权限只能1或2");
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
  <span class="bg_tr">
  <?php
     echo $pagenav;
     ?>
  </span>
  <table class="table" cellspacing="1" cellpadding="2" width="99%" align="center"
border="0">
    <tbody>
      <tr>
        <th height="27" colspan="5" align="left" class="bg_tr">管理员账号管理|<a href="?admin=add">[点击添加管理员]</a></th>
      </tr>
      <tr align="center">
        <td class="td_bg" width="5%">权限</td>
        <td class="td_bg" width="19%" height="26">管理员账户</td>
        <td class="td_bg" width="41%" height="">管理员密码</td>
        <td class="td_bg" width="16%" height="26">管理员级别</td>
        <td class="td_bg" width="12%">操作</td>

      </tr>
      <?php




$sql="SELECT * FROM `510_admin";
$total=mysql_num_rows(mysql_query($sql));
$query=mysql_query($sql);
if($total!=0){
    while($row=mysql_fetch_array($query)){
?>
      <tr align="center">
        <td class="td_bg" width="5%"><?php echo $row[mid] ?></td>
        <td class="td_bg" width="19%" height="44"><?php echo $row[name] ?></td>
        <td class="td_bg" width="41%" height="44"><?php echo $row[passwd] ?></td>
        <td class="td_bg" width="16%" height="44"><?php echo $row[remark] ?></td>
        <td class="td_bg" width="12%"><a href="?id=<?php echo $row[id] ?>">编辑</a>
 <a href="?del=<?php echo $row[id] ?>">删除</a>


         </td>

      </tr>
      <?php
 }
}
  ?>
      <tr>
        <th height="25" colspan="6" align="left" class="bg_tr">
    </th>




          </th>
      </tr>
    </tbody>
  </table>
</FORM>
<?php
if(isset($_GET[admin])||isset($_GET[id])){
if(isset($_GET[id])&&!empty($_GET[id])){
$sql_edit="SELECT * FROM `510_admin` where `id`='$_GET[id]'";
$total_edit=mysql_num_rows(mysql_query($sql_edit));
$query_edit=mysql_query($sql_edit);
if($total_edit!=0){
$row_edit=mysql_fetch_array($query_edit);
}
else{
$db->get_admin_msg("adminadd.php","你要修改的管理员账号不存在请返回");
}
}
?>
<FORM name=formadd method=post>
<table class="table" cellspacing="1" cellpadding="2" width="99%" align="center"
border="0">
    <tbody>
      <tr>
        <th height="27" colspan="2" align="left" class="bg_tr">管理员添加与修改</th>
      </tr>
      <tr align="left">
        <td class="td_bg" width="12%" height="26">管理员账户：</td>
        <td class="td_bg" width="88%" height=""><input name="name" type="text" class="input"  value="<?php echo $row_edit[name];?>" size="40" /></td>
      </tr>

	  <tr align="left">
        <td class="td_bg" width="12%" height="26">管理员密码：</td>
        <td class="td_bg" width="88%" height=""><input name="passwd" type="text" class="input" value="" size="40" />密码留空为不修改</td>
      </tr>

	  <tr align="left">
        <td class="td_bg" width="12%" height="26">管理员级别：</td>
        <td class="td_bg" width="88%" height=""><input name="remark" type="text" class="input"  value="<?php echo $row_edit[remark];?>" size="40" /></td>
      </tr>

      <tr align="left">
        <td class="td_bg" width="12%" height="26">管理员权限：</td>
        <td class="td_bg" width="88%" height=""><input name="mid" type="text" class="input"  value="<?php echo $row_edit[mid];?>" size="3" />* 1 代表超级管理员  2 代表普通管理员（权限区别为普通管理员无法进行管理账号管理）</td>
      </tr>

      <tr align="left">
        <td class="td_bg" height="26" colspan="2"><input type="submit" name="adminsubmit" value="提交"/></td>

      </tr>



    </tbody>
  </table>


</FORM>


<?php
}

?>
</body>
</html>
