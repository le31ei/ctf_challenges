<?php
include_once('global.php');
$smarty->assign("xm_dir",$smarty_template_dir);

//===================
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
$query=$db->query("SELECT * FROM `510_newsclass` where `f_id`=0   order by `sort` asc");
while($row_newclass=$db->fetch_array($query)){
$sm_newclass[]=array("name"=>$row_newclass[name],"id"=>$row_newclass[id],"f_id"=>$row_newclass[f_id]);
}
$smarty->assign("sm_newclass",$sm_newclass);
//新闻分类引入
$query=$db->query("SELECT * FROM `510_single` where `type_id`=2  order by `sort` asc");
while($row_ser=$db->fetch_array($query)){
$sm_ser[]=array("title"=>$row_ser[title],"id"=>$row_ser[id]);
}
$smarty->assign("sm_ser",$sm_ser);
//企业栏目引入



$query=$db->query("SELECT * FROM `510_proclass` where `f_id`=0  order by `sort` asc");
while($row_newsc=$db->fetch_array($query)){
$sm_newsc[]=array("name"=>$row_newsc[name],"id"=>$row_newsc[id]);
  $sql="SELECT * FROM `510_proclass` where `f_id`=$row_newsc[id] order by `sort` asc";
  $query_son=mysql_query($sql);
    while($row_son=mysql_fetch_array($query_son)){
    	$sm_newsson[]=array("name"=>$row_son[name],"id"=>$row_son[id],"f_id"=>$row_son[f_id]);
    }


}
$smarty->assign("sm_newsson",$sm_newsson);
$smarty->assign("sm_newsc",$sm_newsc);
//产品分类引入

//=======================
if(isset($_GET[listid])&&!empty($_GET[listid])){
$sm_listid=$_GET[listid];
$lin=$_GET[cid].">".$_GET[listid];
$SQL="SELECT * FROM `510_procut` where `cid`=$_GET[listid]";

}elseif(isset($_GET[cid])&&!empty($_GET[cid])){
$query_cid=$db->query("SELECT * FROM `510_proclass` where `f_id`=$_GET[cid]");
$lin=$_GET[cid];
if($query_cid){
	while($cid_row=mysql_fetch_array($query_cid)){
		$cid_in.=$cid_row[id].",";
}
$cid_in=$cid_in.$_GET[cid];
$SQL="SELECT * FROM `510_procut` where `cid` in ($cid_in)";
}else{
	$SQL="SELECT * FROM `510_procut` where `cid`=$_GET[cid]";

}

}else{
$SQL="SELECT * FROM `510_procut`";
$lin="";
}

$total=mysql_num_rows(mysql_query($SQL));
if(!empty($lin)){
$lin_arry=explode(">",$lin);
$leng=count($lin_arry);
for($i=0;$i<$leng;$i++){
if(!empty($lin_arry[$i])){   //这里判断地址栏ID是为否为非法
$sql_nav="SELECT * FROM `510_proclass` where `id`=$lin_arry[$i]";
$query_nav=mysql_query($sql_nav);
$row_nav=mysql_fetch_array($query_nav);
if($i==0){
$new_nav.=">&nbsp;<A class=black href=\"product.php?cid=$row_nav[id]\">$row_nav[name]</A>";
}else{
$new_nav.="&nbsp;>&nbsp;".$row_nav[name];
}
                }
}
}
lwphpclass($total, $pagesize = 8);
if(isset($_GET[listid])&&!empty($_GET[listid])){
$SQL="SELECT * FROM `510_procut` where `cid`=$_GET[listid]  limit $firstcount,$pagesize";
	}else if(isset($_GET[cid])&&!empty($_GET[cid])){
$SQL="SELECT * FROM `510_procut` where `cid` in ($cid_in)  limit $firstcount,$pagesize";
}else{
$SQL="SELECT * FROM `510_procut` limit $firstcount,$pagesize";
}
$query=mysql_query($SQL);

if($total!=0){
    while($row=mysql_fetch_array($query)){
  $sm_prolist[]=array("name"=>$row[name],"model"=>$row[model],"pic_1"=>$row[pic_1],"pic_2"=>$row[pic_2],"pic_3"=>$row[pic_3],"parameter"=>$row[parameter],"introduction"=>$row[introduction],"id"=>$row[id],"cid"=>$row[cid],"date_time"=>date("Y-m-d",$row[date_time]));
    }
}
$smarty->assign("new_nav",$new_nav);//引入位置导航
$smarty->assign("pagenav",$pagenav);//引入分类导航
$smarty->assign("sm_prolist",$sm_prolist);//引入新闻列表
//新闻列表引入


if(isset($_GET[cid])&&!empty($_GET[cid])){
$sm_ncid=$_GET[cid];
}
$smarty->assign("sm_ncid",$sm_ncid);
$smarty->assign("sm_listid",$sm_listid);
//企业栏目引入

if(isset($_GET[proid])&&!empty($_GET[proid])){
$SQL="SELECT * FROM `510_procut` where `id`=$_GET[proid]";
$query_con=mysql_query($SQL);
$RtnNum=mysql_num_rows($query_con);
if($RtnNum!=0){
$proid=$_GET[proid];
$sm_rowcontent=mysql_fetch_array($query_con);
}else{
$proid="err";

}
}
else{
$proid="";
}
$smarty->assign("proid",$proid);
$smarty->assign("sm_rowcontent",$sm_rowcontent);

//新闻详细内容引入
//========================
$smarty->display("product.html");
?>
