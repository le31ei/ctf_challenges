<?php
session_start();
define(ALL_PS,"lwphp");
include_once('../common/mysql.class.php');
include_once('../configs/config.php');
include_once('common/page.class.php');
include_once('common/action.class.php');
$db=new action($mydbhost,$mydbuser,$mydbpw,$mydbname,$conn,$mydbcharset);




?>