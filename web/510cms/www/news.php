<?php
include_once('global.php');


$smarty->assign("xm_dir",$smarty_template_dir);

$query=$db->query("SELECT * FROM `510_config`");
while($row=$db->fetch_array($query)){
	$sm_config[$row[name]]=$row[values];
}

$smarty->assign("sm_config",$sm_config);
//网站配置引入
$query=$db->query("SELECT * FROM `510_single` where `type_id`=1  order by `sort` asc");
while($row_comp=$db->fetch_array($query)){
$sm_comp[]=array("title"=>$row_comp[title],"id"=>$row_comp[id]);
}
$smarty->assign("sm_comp",$sm_comp);
//企业栏目引入

$query=$db->query("SELECT * FROM `510_newsclass` where `f_id`=0  order by `sort` asc");
while($row_newsc=$db->fetch_array($query)){
$sm_newsc[]=array("name"=>$row_newsc[name],"id"=>$row_newsc[id]);
  $sql="SELECT * FROM `510_newsclass` where `f_id`=$row_newsc[id] order by `sort` asc";
  $query_son=mysql_query($sql);
    while($row_son=mysql_fetch_array($query_son)){
    	$sm_newsson[]=array("name"=>$row_son[name],"id"=>$row_son[id],"f_id"=>$row_son[f_id]);
    }
}
$smarty->assign("sm_newsson",$sm_newsson);
$smarty->assign("sm_newsc",$sm_newsc);
//新闻分类引入
$query=$db->query("SELECT * FROM `510_proclass` where `f_id`=0   order by `sort` asc");
while($row_procut=$db->fetch_array($query)){
$sm_procut[]=array("name"=>$row_procut[name],"id"=>$row_procut[id],"f_id"=>$row_procut[f_id]);
}
$smarty->assign("sm_procut",$sm_procut);
//产品分类引入
$query=$db->query("SELECT * FROM `510_single` where `type_id`=2  order by `sort` asc");
while($row_ser=$db->fetch_array($query)){
$sm_ser[]=array("title"=>$row_ser[title],"id"=>$row_ser[id]);
}
$smarty->assign("sm_ser",$sm_ser);
//企业栏目引入



if(isset($_GET[listid])&&!empty($_GET[listid])){
$sm_listid=$_GET[listid];
$lin=$_GET[cid].">".$_GET[listid];
$SQL="SELECT * FROM `510_newbase` where `cid`=$_GET[listid]";

}elseif(isset($_GET[cid])&&!empty($_GET[cid])){
$query_cid=$db->query("SELECT * FROM `510_newsclass` where `f_id`=$_GET[cid]");
$lin=$_GET[cid];
if($query_cid){
	while($cid_row=mysql_fetch_array($query_cid)){
		$cid_in.=$cid_row[id].",";
}
$cid_in=$cid_in.$_GET[cid];
$SQL="SELECT * FROM `510_newbase` where `cid` in ($cid_in)";
}else{
	$SQL="SELECT * FROM `510_newbase` where `cid`=$_GET[cid]";

}

}else{
$SQL="SELECT * FROM `510_newbase`";
$lin="";
}

$total=mysql_num_rows(mysql_query($SQL));
if(!empty($lin)){
$lin_arry=explode(">",$lin);
$leng=count($lin_arry);
for($i=0;$i<$leng;$i++){
if(!empty($lin_arry[$i])){   //这里判断地址栏ID是为否为非法
$sql_nav="SELECT * FROM `510_newsclass` where `id`=$lin_arry[$i]";
$query_nav=mysql_query($sql_nav);
$row_nav=mysql_fetch_array($query_nav);
if($i==0){
$new_nav.=">&nbsp;<A class=black href=\"news.php?cid=$row_nav[id]\">$row_nav[name]</A>";
}else{
$new_nav.="&nbsp;>&nbsp;".$row_nav[name];
}
                }
}
}
lwphpclass($total, $pagesize = 15);
if(isset($_GET[listid])&&!empty($_GET[listid])){
$SQL="SELECT * FROM `510_newbase` where `cid`=$_GET[listid] order by `date_time` desc  limit $firstcount,$pagesize";
	}else if(isset($_GET[cid])&&!empty($_GET[cid])){
$SQL="SELECT * FROM `510_newbase` where `cid` in ($cid_in) order by `date_time` desc  limit $firstcount,$pagesize";
}else{
$SQL="SELECT * FROM `510_newbase` order by `date_time` desc limit $firstcount,$pagesize";
}
$query=mysql_query($SQL);

if($total!=0){
    while($row=mysql_fetch_array($query)){
  $sm_newslist[]=array("title"=>$row[title],"id"=>$row[id],"cid"=>$row[cid],"date_time"=>date("Y-m-d",$row[date_time]));
    }
}
$smarty->assign("new_nav",$new_nav);//引入位置导航
$smarty->assign("pagenav",$pagenav);//引入分类导航
$smarty->assign("sm_newslist",$sm_newslist);//引入新闻列表
//新闻列表引入


if(isset($_GET[cid])&&!empty($_GET[cid])){
$sm_ncid=$_GET[cid];
}
$smarty->assign("sm_ncid",$sm_ncid);
$smarty->assign("sm_listid",$sm_listid);
//企业栏目引入

if(isset($_GET[newsid])&&!empty($_GET[newsid])){
$SQL="SELECT * FROM `510_newscontent` where `nid`=$_GET[newsid]";
$query_con=mysql_query($SQL);
$RtnNum=mysql_num_rows($query_con);
if($RtnNum!=0){
$newstid=$_GET[newsid];
$sm_rowcontent=mysql_fetch_array($query_con);
$SQL="SELECT * FROM `510_newbase` where `id`=$_GET[newsid]";
$query_con=mysql_query($SQL);
$sm_rowtitle=mysql_fetch_array($query_con);
}else{
$newstid="err";
}
}
else{
$newstid="";
}
$smarty->assign("newstid",$newstid);
$smarty->assign("sm_rowcontent",$sm_rowcontent);
$smarty->assign("sm_rowtitle",$sm_rowtitle);
//新闻详细内容引入






$smarty->display("news.html");
?>
