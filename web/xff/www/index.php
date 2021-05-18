<?php
$locals = array("127.0.0.1", "localhost");
$local_urls = array("http://127.0.0.1", "http://localhost");
if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
	if(in_array($_SERVER['HTTP_X_FORWARDED_FOR'], $locals)){
		if(isset($_SERVER['HTTP_REFERER'])){
			for ($i=0; $i < count($local_urls) ; $i++) { 
				if (strpos($_SERVER['HTTP_REFERER'],$local_urls[i]) !== Flase) {
					die("<p>Flag: flag{15cc8eee88302965c61497c147e6ca4c} </p>");
				}
			}
			die("<p>Referer: http://????/</p>");
		}
		die("<p>Must be jump from Home Page.</p>");
	}
}
die("Must be accessed from Xiaohong's own computer.");
?>