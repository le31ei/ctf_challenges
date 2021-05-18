<?php

$data = scandir("./");
$return_array = [];

foreach($data as $file) {
  if($file !== '.' && $file !== '..' && $file !== 'index.php') {
    array_push($return_array, file_get_contents($file));
    unlink($file);
  }
}

die(json_encode($return_array));
