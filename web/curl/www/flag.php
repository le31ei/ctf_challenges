<?php
	if(isset($_SERVER['REMOTE_ADDR'])){
		$rm_ad = $_SERVER['REMOTE_ADDR'];
		// echo "REMOTE_ADDR is:$rm_ad";
		if($rm_ad == "127.0.0.1"){
			die("Flag is : flag{402eab0713f9262de52359604a24be0f}");
		}
	}
?>
Must be accessed from localhost!!!!!