<?php
class action extends mysql{
public	function user_shell($uid,$shell,$mid,$online){
$query=$this->query("select * from 510_admin where `id`='$uid'");
$us=is_array($row=$this->fetch_array($query));
$shell=$us ? $shell==md5($row[name].$row[pw].ALL_PS): false;
if($shell){
	if($row[mid]<=$mid){
    $new_time=mktime();
	if($new_time-$online>'6000'){
		$this->get_admin_msg('login.php',$show="你已超时请重新登录");
		session_destroy();
		exit();
	}else{
	$_SESSION[times]=mktime();
    return $row;
	}
	}else {
	$this->get_admin_msg('admin_index.php',$show="你的权限不足,请继续其它项目的管理");
	exit();
	}
}else{
	$this->get_admin_msg('login.php',$show="你无权限访该内容请先登录");
	exit();
}
}

public function logout(){
	session_destroy();
	$this->get_admin_msg('login.php',$show="你已成功退出");
}



public function get_admin_msg($url,$show="操作已成功"){
		$msg='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
</head>
<body>
<div>
<table width="30%" border="1" align="center" cellpadding="3" cellspacing="0" style="margin-top:100px">
<tr><th align="center" style="background:#cef">信息提示</th></tr>
<tr><td><p>'.$show.'<br />
2秒后返回指定界面！<br />
如果浏览器无法跳转，<a href="'.$url.'">请点击此处</a>.</p>
</td></tr>
</table>
</div>
</body>
</html>';
echo $msg;
exit();
	}
}
?>
