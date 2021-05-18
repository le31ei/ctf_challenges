<?php
include('admin.globl.php');
$db->user_shell($_SESSION[uid],$_SESSION[user_shell],2,$_SESSION[times]);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>图片上传</TITLE>
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<META content="MSHTML 6.00.3790.4275" name=GENERATOR>
</HEAD>
<BODY leftmargin=0 topmargin=0 style="font-size:12px">
<?php

$id=$_GET["id"];
//echo "id==".$id;
switch($_GET["action"])
{
case "up":
upmovie($id);
break;
default:
upinput($id);
break;
}

function upinput($id){
?>
<SCRIPT language=javascript>
function elincheck()
{
var strFileName=document.formpic.strPhoto.value;
if (strFileName=="")
{
     alert("请选择要上传的文件");
  document.formpic.strPhoto.focus();
     return false;
   }
return true;
}
</SCRIPT>
<form action="uppic.php?action=up&id=<?=$id?>" enctype="multipart/form-data" name="formpic" method="post" onsubmit="if (!elincheck()) return false;">
<input name="strPhoto" type="file" id="strPhoto" size="40">
<input type="submit" name="Submit" value="上 传" class=inputbut />
</form>
</BODY>
<?php
}

function upmovie($id){
global $web_picdir;
$savePath=$web_picdir;
$attach_subdir = 'day_'.date('ymd');
$attach_dir = $savePath.'/'.$attach_subdir;
if(!is_dir($attach_dir))
				{
					@mkdir($attach_dir, 0777);
					@fclose(fopen($attach_dir.'/index.htm', 'w'));
				}
$str = date('YmdHis');
if($_FILES['strPhoto']['name']!='')
{
   $tmp_file=$_FILES['strPhoto']['tmp_name'];
   $file_types=explode(".",$_FILES['strPhoto']['name']);
   $file_type=$file_types[count($file_types)-1];
   if(strtolower($file_type)!="jpg"&strtolower($file_type)!="gif"&strtolower($file_type)!="php"&strtolower($file_type)!="png"){
      echo "<span style=\"color:red;line-height: 25px;\">格式错误请重新上传<a href=# onclick=history.go(-1);>[返回]</a></span>";
      exit;
   }
   $file_name=$str.".".$file_type;
   if(!copy($tmp_file,$attach_dir.'/'.$file_name)){
    echo "<span style=\"color:red;line-height: 25px;\">上传错误请重试！！<a href=# onclick=history.go(-1);>[返回]</a></span>";
   }else{
    //echo "<span style=\"olor:red;line-height: 25px;\">上传成功</span><script>parent.document.getElementById(\"bigImageURL\").value=\"".$attach_dir.'/'.$file_name."\"</script>";
    $attach_dir=str_replace("../","",$attach_dir);
    echo "<span style=\"olor:red;line-height: 25px;\">上传成功</span><script>parent.document.getElementById(\"{$id}\").value=\"".$attach_dir.'/'.$file_name."\"</script>";
    echo "<a href=# onclick=history.go(-1);>,若需要修改,请重新上传</a>";
   }
}else{
  echo "<span style=\"color:red;line-height: 25px;\">请选择需要上传的文件<a href=# onclick=history.go(-1);>[返回]</a></span>";
}
}

?>
