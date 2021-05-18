<?php

require '../smarty/libs/Smarty.class.php';
$smarty = new Smarty;
$smarty->debugging = false;

$smarty->assign('foo','value');
    if(isset($_SERVER)){    
        if(isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
           $real_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }elseif(isset($_SERVER["HTTP_CLIENT_IP"])) {
           $real_ip = $_SERVER["HTTP_CLIENT_IP"];
        }else{
            $real_ip = $_SERVER["REMOTE_ADDR"];
        }
    }else{
        if(getenv("HTTP_X_FORWARDED_FOR")){
              $real_ip = getenv("HTTP_X_FORWARDED_FOR");
        }elseif(getenv("HTTP_CLIENT_IP")) {
              $real_ip = getenv("HTTP_CLIENT_IP");
        }else{
              $real_ip = getenv("REMOTE_ADDR");
        }
    }
$template_string = $real_ip;

$smarty->display('string:'.$template_string); 

?>
