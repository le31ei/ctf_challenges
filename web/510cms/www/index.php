<?php
include_once('global.php');
$smarty->assign("xm_dir",$smarty_template_dir);
//模板路径引入
$query=$db->query("SELECT * FROM `510_config`");
while($row=$db->fetch_array($query)){
	$sm_config[$row[name]]=$row[values];
}

$smarty->assign("sm_config",$sm_config);
//网站配置引入
$query=$db->query("SELECT * FROM `510_proclass`  where `f_id`=0 limit 0,4");
while($row_cid=$db->fetch_array($query)){
$sm_procid[]=array("name"=>$row_cid[name],"id"=>$row_cid[id],"cidpic"=>$row_cid[cidpic],"remark"=>$row_cid[remark]);
}
$smarty->assign("sm_procid",$sm_procid);

//产品首页分类引入
$query=$db->query("SELECT * FROM `510_newbase`  order by `id` desc limit 0,4");
while($row_news=$db->fetch_array($query)){
$sm_news[]=array("title"=>$row_news[title],"id"=>$row_news[id],"cid"=>$row_news[cid]);
}
$smarty->assign("sm_news",$sm_news);
//最新新闻引入
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








$smarty->display("index.html");
?>
