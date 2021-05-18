<?php
include_once('global.php');
$smarty->assign("xm_dir",$smarty_template_dir);

if(isset($_POST['submit_message'])){
if($_POST[c_name]&&$_POST[c_phone]&&$_POST[c_mail]&&$_POST[c_title]&&$_POST[c_content]){

$db->query("INSERT INTO `510cms`.`510_messages` (
`id` ,
`c_name` ,
`c_phone` ,
`c_mail` ,
`c_title` ,
`c_content` ,
`c_date`
)
VALUES (
NULL , '$_POST[c_name]', '$_POST[c_phone]', '$_POST[c_mail]', '$_POST[c_title]', '$_POST[c_content]', '".mktime()."'
);
");
$db->get_show_msg('message.php','你的留言已发布成功我们会尽快联系你，谢谢！');
}else{
$db->get_show_msg('message.php','请正确填写相应的内容以便我们能及时与您取得联系，谢谢！');
}
}
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
$query=$db->query("SELECT * FROM `510_single` where `type_id`=2  order by `sort` asc");
while($row_ser=$db->fetch_array($query)){
$sm_ser[]=array("title"=>$row_ser[title],"id"=>$row_ser[id]);
}
$smarty->assign("sm_ser",$sm_ser);
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










$smarty->display("message.html");
?>
