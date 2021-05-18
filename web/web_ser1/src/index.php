<?php
include "flag.php";
$unserialize_str = $_POST['data']; 
$data_unserialize = unserialize($unserialize_str); 
if($data_unserialize['user'] == 'admin' && $data_unserialize['pass']=='nicaicaikan') 
{ 	
     print_r($flag); 
}
else{
	highlight_file("index.php");
}