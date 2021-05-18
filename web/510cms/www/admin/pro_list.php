<?php
include('admin.globl.php');
$db->user_shell($_SESSION[uid],$_SESSION[user_shell],2,$_SESSION[times]);
$query=$db->findall("510_proclass");
while($row=$db->fetch_array($query)){
	$news_class_arr[$row[id]]=$row[name];
}
if(isset($_GET[del])){
  if($_GET[del]==data){
$ID_Dele= implode(",",$_POST['lin']);
$db->delete("510_procut","`id` in (".$ID_Dele.")");
$db->get_admin_msg("pro_list.php","删除成功");
}else{
$db->delete("510_procut","`id` = $_GET[del]");
$db->get_admin_msg("pro_list.php","删除成功");
}
}
$cidd=$_GET[classid];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK" />
<title>新闻列表</title>
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

function sh()
{
	if(Checked()  <= 0){
		alert("您至少选择1条信息!");
	}
	else{
		if(confirm("确定要审核通过所选文章吗？！")){
			form.action="sh.php?del=data";
			form.submit();
		}
	}
}

</SCRIPT>
</head>
<body>
<?php
$query=$db->findall("510_proclass order by sort asc, id Desc");
while($row=$db->fetch_array($query)){
	$class_arr[] = array($row['id'],$row['name'],$row['f_id'],$row['sort']);
}
?>

<FORM name=form method=post>
<table class="table" cellspacing="1" cellpadding="2" width="99%" align="center"
border="0">
  <tbody>
    <tr>
<th height="27" colspan="7" align="left" class="bg_tr">转到：
<select name="id" onChange="javascript:window.location.href=this.options[this.selectedIndex].value" >
<option value="?classid=" selected>所有类别</option>
<?php
dafenglei_select(0,0,$cidd)
?>
	</select></th>
    </tr>

    <tr align="center">
         <td class="td_bg" width="3%">ID</td>
         <td class="td_bg" width="28%" height="26">产品名称</td>
         <td class="td_bg" width="27%" height="">产品型号</td>
	     <td class="td_bg" width="15%" height="26">所属类别</td>
	     <td class="td_bg" width="12%" height="">日期</td>
		 <td class="td_bg" width="10%">操作</td>
	    <td class="td_bg" width="5%" height=""><input id=chkAll
                  onClick=CheckAll(this.form) type=checkbox
                  value=checkbox name=chkAll></td>
    </tr>


<?php


if($cidd!=""){
$sql="SELECT * FROM `510_procut` where `cid`=$cidd";
}else{
$sql="SELECT * FROM `510_procut";
}
$total=mysql_num_rows(mysql_query($sql));
lwphpclass($total, $pagesize = 5);
if($cidd!=""){
$SQL="SELECT * FROM `510_procut` where `cid`=$cidd limit $firstcount,$pagesize";
}else{
$SQL="SELECT * FROM `510_procut` limit $firstcount,$pagesize";
}
$query=mysql_query($SQL);
if($total!=0){
    while($row=mysql_fetch_array($query)){
?>
<tr align="center">
<td class="td_bg" width="3%"><?php echo $row[id] ?></td>
<td class="td_bg" width="28%" height="26"><?php echo $row[name] ?></td>
<td class="td_bg" width="27%" height=""><?php echo $row[model] ?></td>
<td class="td_bg" width="15%" height="26"><?php echo $news_class_arr[$row[cid]] ?></td>
<td class="td_bg" width="12%" height=""><?php echo date("Y-m-d",$row[date_time]) ?></td>
<td class="td_bg" width="10%"><a href="pro_edit.php?id=<?php echo $row[id] ?>">编辑</a> <a href="?del=<?php echo $row[id] ?>">删除</a></td>
<td class="td_bg" width="5%" height=""><input type=checkbox value=<?php echo $row[id] ?> name="lin[]" onClick=Checked(form)></td>
</tr>
<?php
 }
}
  ?>

  <tr>
      <th height="25" colspan="6" align="left" class="bg_tr">
     <?php
     echo $pagenav;
     ?>     </th>
	  <th height="25"  align="right" class="bg_tr">

     <p align="right"><INPUT title=删除 onclick=DelAll() type=button value=删除 name=Submit>
     </th>
  </tr>
</tbody>
</table>

</FORM>
<?php
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
				echo "        <option value=\"?classid=".$class_arr[$i][0]."\" selected=\"selected\">".$n."|--".$class_arr[$i][1]."</option>\n";
			}else{
				echo "        <option value=\"?classid=".$class_arr[$i][0]."\">".$n."|--".$class_arr[$i][1]."</option>\n";
			}
			dafenglei_select($m+1,$class_arr[$i][0],$index);

		}

	}

}
?>
</body>
</html>
