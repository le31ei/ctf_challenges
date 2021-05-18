<?php
include('admin.globl.php');
$db->user_shell($_SESSION[uid],$_SESSION[user_shell],2,$_SESSION[times]);

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK" />
<title>系统参数页</title>
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
<?php
date_default_timezone_set("Etc/GMT-8");
?>






<body>
<table class="table" cellspacing="1" cellpadding="2" width="99%" align="center"
border="0">
  <tbody>
    <tr>
      <th class="bg_tr" align="left" colspan="2" height="25">服务器的有关参数
        <input onClick="switchBar(this)" type="button" value="关闭左边管理菜单" name="SubmitBtn" />     </th>
    </tr>
    <tr>
      <td class="td_bg" width="17%" height="23">PHP版本：</td>
      <td class="td_bg" width="83%"><?php echo "PHP".PHP_VERSION; ?></td>
    </tr>
    <tr>
      <td class="td_bg" width="17%" height="23">MYSQL版本：</td>
      <td class="td_bg" width="83%"><?php echo mysql_get_server_info(); ?></td>
    </tr>
    <tr>
      <td class="td_bg" width="17%" height="23">服务器名：</td>
      <td class="td_bg" width="83%"><?php echo $_SERVER['SERVER_NAME']; ?></td>
    </tr>
    <tr>
      <td class="td_bg" width="17%" height="23">服务器IP：</td>
      <td class="td_bg" width="83%"><?php echo $_SERVER["HTTP_HOST"]; ?></td>
    </tr>
	  <tr>
      <td class="td_bg" width="17%" height="23">服务器端口：</td>
      <td class="td_bg" width="83%"><?php echo $_SERVER["SERVER_PORT"]; ?></td>
    </tr>
	  <tr>
      <td class="td_bg" width="17%" height="23">服务器时间：</td>
      <td class="td_bg" width="83%"><?php echo $showtime=date("Y-m-d H:i:s");?></td>
    </tr>
	  <tr>
      <td class="td_bg" width="17%" height="23">服务器操作系统：</td>
      <td class="td_bg" width="83%"><?php echo PHP_OS; ?></td>
    </tr>
	  <tr>
      <td class="td_bg" width="17%" height="23">站点物理路径：</td>
      <td class="td_bg" width="83%"><?php echo $_SERVER["DOCUMENT_ROOT"]; ?></td>
    </tr>












  </tbody>
</table>
<table class="table" cellspacing="1" cellpadding="2" width="99%" align="center"
border="0">
  <tbody>
    <tr>
      <th class="bg_tr" align="left" colspan="2" height="25">网站管理系统版本</th>
    </tr>
    <tr>
      <td class="td_bg" width="17%" height="23">当前版本<span class="TableRow2"></span></td>
      <td width="83%" class="td_bg"><strong>ELINSTUDIOW企业网站CMS<span class="TableRow1"></span></strong></td>
    </tr>
    <tr>
      <td class="td_bg" width="17%" height="23">版权声明<span class="TableRow2"></span></td>
      <td class="td_bg" width="83%">1、本软件为共享软件,未经书面授权，不得向任何第三方提供本软件系统; <br>
        2、用户自由选择是否使用,在使用中出现任何问题和由此造成的一切损失作者将不承担任何责任; <br>
        3、您可以对本系统进行修改和美化，但必须保留完整的版权信息;  　<br>
      4、本软件受中华人民共和国《著作权法》《计算机软件保护条例》等相关法律、法规保护，作者保留一切权利。</td>
    </tr>
  </tbody>
</table>
<table class="table" cellspacing="1" cellpadding="2" width="99%" align="center"
border="0">
  <tbody>
    <tr>
      <th class="bg_tr" align="left" colspan="2" height="25">网站管理系统开发 </th>
    </tr>
    <tr>
      <td class="td_bg" width="17%" height="23">程序制作<span class="TableRow2"></span></td>
      <td width="83%" class="td_bg"><strong>ELINSTUDIO工作室(承接网站制作,后台开发 )</strong></td>
    </tr>
    <tr>
      <td class="td_bg" height="23">联系方式<span class="TableRow2"></span></td>
      <td class="td_bg">E_mail：781282886@qq.com    QQ：781282886 </td>
    </tr>
    <tr>
      <td class="td_bg" width="17%" height="23">程序主页<span class="TableRow2"></span></td>
      <td class="td_bg" width="83%"><a href="http://www.xmf1.com" target="_blank">www.xmf1.com</a><a href="http://www.865171.cn" target="_blank"></a> </td>
    </tr>
  </tbody>
</table>
</body>
</html>
