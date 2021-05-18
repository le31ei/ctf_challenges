<?php
function lwphpclass($total, $pagesize = 5){
global $page, $firstcount, $pagenav;

$url=$_SERVER["REQUEST_URI"];
$parse_url=parse_url($url);
$url_path=$parse_url[path];
$url_query=$parse_url[query];
$page=$_GET[page];
$classid=$_GET[classid];
if($url_query){

$url_query=ereg_replace("(^|&)page=$page","",$url_query);


$url=str_replace($parse_url["query"],$url_query,$url);

if($url_query) $url.="&page"; else $url.="page";
}else {
$url.="?page";
}

if(!$page) $page=1;

$lastpg=ceil($total/$pagesize);
$page=min($lastpg,$page);
$prepg=$page-1; //上一页
$nextpg=($page==$lastpg ? 0 : $page+1); //下一页
$firstcount=($page-1)*$pagesize;

$pagenav="显示第 <B>".($total?($firstcount+1):0)."</B>-<B>".min($firstcount+$pagesize,$total)."</B> 条记录，共 $total 条记录";

$pagenav.=" <a href='$url=1'>首页</a> ";
if($prepg) $pagenav.=" <a href='$url=$prepg'>前页</a> "; else $pagenav.=" 前页 ";
if($nextpg) $pagenav.=" <a href='$url=$nextpg'>后页</a> "; else $pagenav.=" 后页 ";
$pagenav.=" <a href='$url=$lastpg'>尾页</a> ";

$pagenav.="转到第 <select name='topage' size='1' onchange='window.location=\"$url=\"+this.value'>\n";
for($i=1;$i<=$lastpg;$i++){
if($i==$page) $pagenav.="<option value='$i' selected>$i</option>\n";
else $pagenav.="<option value='$i'>$i</option>\n";
}
$pagenav.="</select> 页，共 $lastpg 页";

}



?>
