<?php
include('admin.globl.php');
$db->user_shell($_SESSION[uid],$_SESSION[user_shell],2,$_SESSION[times]);
$query=$db->findall('510_config');
while($row=$db->fetch_array($query)){
	$row_arr[$row[name]]=$row[values];
}

if(isset($_POST['update'])){
	unset($_POST['update']);
	foreach($_POST as $name=>$values){
		$db->query("update `510_config` set `values`='$values' where `name`='$name'");
	}
	$db->get_admin_msg('websiteconfig.php','配置信息已修改成功！');
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK" />
<title>无标题文档</title>
<link href="Images/css1/css.css" rel="stylesheet" type="text/css">
</head>
<SCRIPT language=javascript>
<!--
var displayBar=true;
function switchBar(obj){
	if (displayBar)
	{
		parent.frame.cols="0,*";
		displayBar=false;
		obj.value="打开左边管理菜单";
	}
	else{
		parent.frame.cols="195,*";
		displayBar=true;
		obj.value="关闭左边管理菜单";
	}
}

function fullmenu(url){
	if (url==null) {url = "admin_left.asp";}
	parent.leftFrame.location = url;
}

//-->
</SCRIPT>




 <% Dim theInstalledObjects(4)
theInstalledObjects(0) = "Gatherer.VBProcess"
theInstalledObjects(1) = "Scripting.FileSystemObject"
theInstalledObjects(2) = "adodb.connection"

theInstalledObjects(3) = "JMail.SMTPMail"
theInstalledObjects(4) = "CDONTS.NewMail"
Function IsObjInstalled(ByVal strClassString)
	Dim xTestObj,ClsString
	On Error Resume Next
	IsObjInstalled = False
	ClsString = strClassString
	Err = 0
	Set xTestObj = Server.CreateObject(ClsString)
	If Err = 0 Then IsObjInstalled = True
	If Err = -2147352567 Then IsObjInstalled = True
	Set xTestObj = Nothing
	Err = 0
	Exit Function
End Function %>


<body>
<table class="table" cellspacing="1" cellpadding="2" width="99%" align="center"
border="0">
  <tbody>
    <tr>
      <th class="bg_tr" align="left" colspan="2" height="25">网站基本配置信息     </th>
    </tr>
  <form action="" method="post" >
    <tr>
      <td class="td_bg" width="8%" height="23">公司名称：     </td>
      <td class="td_bg" width="92%"><input name="cpname" type="text"  value="<?php echo $row_arr[cpname];?>"></td>
    </tr>
    <tr>
      <td class="td_bg" width="8%" height="22">公司电话：      </td>
      <td class="td_bg" width="92%"><input name="cptel" type="text" value="<?php echo $row_arr[cptel];?>"></td>
    </tr>
    <tr>
      <td class="td_bg" width="8%" height="23">公司传真：      </td>
      <td class="td_bg" width="92%"><input name="cpfox" type="text" value="<?php echo $row_arr[cpfox];?>"></td>
    </tr>
    <tr>
      <td class="td_bg" width="8%" height="23">公司邮箱：      </td>
      <td class="td_bg" width="92%"><input name="cpmail" type="text" value="<?php echo $row_arr[cpmail];?>"></td>
    </tr>
	<tr>
      <td class="td_bg" width="8%" height="23">公司地址：      </td>
      <td class="td_bg" width="92%"><input name="cpadd" type="text" value="<?php echo $row_arr[cpadd];?>" size="40"></td>
    </tr>
	<tr>
      <td class="td_bg" width="8%" height="23">网站名称：      </td>
      <td class="td_bg" width="92%"><input name="webname" type="text" value="<?php echo $row_arr[webname];?>" size="40"></td>
    </tr>

 	<tr>
      <td class="td_bg" width="8%" height="23">网站域名：      </td>
      <td class="td_bg" width="92%"><input name="weburl" type="text" value="<?php echo $row_arr[weburl];?>" size="40"></td>
    </tr>
	<tr>
      <td class="td_bg" width="8%" height="23">网站描述：</td>
      <td class="td_bg" width="92%"><input name="webdes" type="text" value="<?php echo $row_arr[webdes];?>" size="60">请正确填写以提高网站优化效果。</td>
    </tr>
	<tr>
      <td class="td_bg" width="8%" height="23">网站关键字：      </td>
      <td class="td_bg" width="92%"><input name="webkw" type="text" value="<?php echo $row_arr[webkw];?>" size="60">此处为搜索引挚关键字，每个关键字之问请用豆号隔开。</td>
    </tr>
	<tr>
      <td class="td_bg" width="8%" height="23">版权说明：      </td>
      <td class="td_bg" width="92%"><textarea  name="copyright"  rows="8" cols="80"  ><?php echo $row_arr[copyright];?></textarea>
      支持HTML标签。</td>
    </tr>


	<tr>
      <td  colspan="2" class="td_bg" align="left">
      <input name="update" type="submit" value="点击这里提交设置"></td>
    </tr>
    </form>
  </tbody>
</table>

</body>
</html>
