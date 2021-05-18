<?php 
@session_start();

ini_set('open_basedir', '/var/www/html/:/tmp/'); 

$file = @$_SESSION['file'];
if (isset($_GET['file'])) {
    $file = $_GET['file'];
}

@include $file;

$_SESSION['file'] = $file;
show_source(__FILE__); 