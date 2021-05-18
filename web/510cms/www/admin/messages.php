<?php
include('admin.globl.php');
$db->user_shell($_SESSION[uid],$_SESSION[user_shell],2,$_SESSION[times]);
if(isset($_GET[del])){
  if($_GET[del]==data){
$ID_Dele= implode(",",$_POST['lin']);
$db->delete("510_messages","`id` in (".$ID_Dele.")");
$db->get_admin_msg("messages.php","删除成功");
}else{
$db->delete("510_messages","`id` = $_GET[del]");
$db->get_admin_msg("messages.php","删除成功");
}
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK" />
<title>客户留主管理</title>
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
<?php
if(isset($_GET[id])&&!empty($_GET[id])){
$SQL="SELECT * FROM `510_messages` where `id`='$_GET[id]'";
$total=mysql_num_rows(mysql_query($SQL));
$query=mysql_query($SQL);
if($total!=0){
$row=mysql_fetch_array($query);
?>
<table class="table" cellspacing="1" cellpadding="2" width="99%" align="center"
border="0">
    <tbody>
      <tr>
        <th height="27" colspan="2" align="left" class="bg_tr">查看留言</th>
      </tr>
      <tr align="left">
        <td class="td_bg" width="6%" height="26">姓名：</td>
        <td class="td_bg" width="94%" height=""><?php echo $row[c_name];?></td>
      </tr>

	  <tr align="left">
        <td class="td_bg" width="6%" height="26">电话：</td>
        <td class="td_bg" width="94%" height=""><?php echo $row[c_phone];?></td>
      </tr>

	  <tr align="left">
        <td class="td_bg" width="6%" height="26">E--MAIL：</td>
        <td class="td_bg" width="94%" height=""><?php echo $row[c_mail];?></td>
      </tr>

	  <tr align="left">
        <td class="td_bg" width="6%" height="26">主题：</td>
        <td class="td_bg" width="94%" height=""><?php echo $row[c_title];?></td>
      </tr>

	  <tr align="left">
        <td class="td_bg" width="6%" height="292">内容：</td>
        <td class="td_bg" width="94%" height="292" valign="top"><?php echo $row[c_content];?></td>
      </tr>

      <tr align="left">
        <td class="td_bg" width="6%" height="26" colspan="2"><a href="messages.php">［点击反回］</a><a href="?del=<?php echo $row[id] ?>">［点击删除］</a></td>

      </tr>



    </tbody>
  </table>

<?php
}
else{
	$db->get_admin_msg("messages.php","你要查看的留言不存在或已删除");
}
}
else{
?>
<FORM name=form method=post>
  <table class="table" cellspacing="1" cellpadding="2" width="99%" align="center"
border="0">
    <tbody>
      <tr>
        <th height="27" colspan="8" align="left" class="bg_tr">客户留言管理</th>
      </tr>
      <tr align="center">
        <td class="td_bg" width="2%">ID</td>
        <td class="td_bg" width="10%" height="26">姓名</td>
        <td class="td_bg" width="12%" height="">电话</td>
        <td class="td_bg" width="17%" height="26">E-MAIL</td>
		  <td class="td_bg" width="35%" height="26">标题</td>
        <td class="td_bg" width="9%" height="">日期</td>
        <td class="td_bg" width="9%">操作</td>
        <td class="td_bg" width="6%" height=""><input id=chkAll
                  onClick=CheckAll(this.form) type=checkbox
                  value=checkbox name=chkAll></td>
      </tr>
      <?php

$sql="SELECT * FROM `510_messages";

$total=mysql_num_rows(mysql_query($sql));
lwphpclass($total, $pagesize = 5);
$SQL="SELECT * FROM `510_messages` limit $firstcount,$pagesize";

$query=mysql_query($SQL);
if($total!=0){
    while($row=mysql_fetch_array($query)){
?>
      <tr align="center">
        <td class="td_bg" width="2%"><?php echo $row[id] ?></td>
        <td class="td_bg" width="10%" height="26"><?php echo $row[c_name] ?></td>
        <td class="td_bg" width="12%" height=""><?php echo $row[c_phone] ?></td>
        <td class="td_bg" width="17%" height="26"><?php echo $row[c_mail] ?></td>
        <td class="td_bg" width="35%" height=""><?php echo $row[c_title] ?></td>
		<td class="td_bg" width="9%" height=""><?php echo date("Y-m-d",$row[c_date]) ?></td>
        <td class="td_bg" width="9%"><a href="?id=<?php echo $row[id] ?>">查看</a> <a href="?del=<?php echo $row[id] ?>">删除</a></td>
        <td class="td_bg" width="6%" height=""><input type=checkbox value=<?php echo $row[id] ?> name="lin[]" onClick=Checked(form)></td>
      </tr>
      <?php
 }
}
  ?>
      <tr>
        <th height="25" colspan="7" align="left" class="bg_tr"> <?php
     echo $pagenav;
     ?>
        </th>
        <th height="25"  align="right" class="bg_tr"> <p align="right">
          <input title=删除 onClick=DelAll() type=button value=删除 name=Submit>
          </th>
      </tr>
    </tbody>
  </table>
</FORM>
<?php
}
?>
</body>
</html>
