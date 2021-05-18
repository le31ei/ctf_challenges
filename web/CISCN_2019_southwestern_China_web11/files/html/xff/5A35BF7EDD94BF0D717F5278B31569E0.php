<?php

require_once('/flag');

if(empty($_GET['user']))
    die(show_source(__FILE__));


$user=$_GET['user'];

if(preg_match('/[A-Za-z]+/s',$user)) {
    echo 'you are hacker!!!';
    die();
}

$user=(int)($user);
if($user=='admin'){
    echo $flag;

} else{
    echo 'you are hacker!!!!';
}

?>
