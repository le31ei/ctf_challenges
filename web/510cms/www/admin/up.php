<?php
include('admin.globl.php');
$db->user_shell($_SESSION[uid],$_SESSION[user_shell],2,$_SESSION[times]);
$fd=$_GET["fd"];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="text.css" rel="stylesheet" type="text/css">
<title>上传</title>
</head>
<body>
<table width="400" border="0" align="center" cellpadding="6" cellspacing="1" bgcolor="#A2A2A2">
  <form action="upload.php?fd=<?php echo $fd;?>" method="post" enctype="multipart/form-data" name="form">
<tr>
    <td height="30" bgcolor="#F2F2F2">&nbsp; &nbsp;请选择要上传的文件：</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#F2F2F2">
        <input type="file" name="upload">
      </td>
  </tr>
  <tr>
    <td align="center" bgcolor="#F2F2F2">      <input name="Submit2" type="reset" id="Submit2" value="重置">
      　      <input type="submit" name="submit" value=" 提交 "></td>
  </tr>
  </form>
</table>
</body>
</html>

