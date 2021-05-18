<?php
error_reporting(0);

function curl_get($url){
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_HEADER,0);
	$output = curl_exec($ch);
	if($output === FALSE ){
		echo "CURL Error:".curl_error($ch);
	}
	curl_close($ch);
	echo $output;
}

$disable_url_hosts = array("127.0.0.1", "localhost");
if(isset($_GET['urls'])){
	$urls = $_GET['urls'];
	$url_host = parse_url($urls,PHP_URL_HOST);
	if (in_array($url_host, $disable_url_hosts)) {
		die("Access local resources is not allowed!!!<a>$url_host</a>");
	}elseif (strpos($url_host,"127.0.") === 0) {
		die("Access local resources is not allowed!!!<a>$url_host</a>");
	}

	curl_get($urls);
}
?>
<html>
<head>
<style>
blockquote { background: #eeeeee; }
h1 { border-bottom: solid black 2px; }
h2 { border-bottom: solid black 1px; }
.comment { color: darkgreen; }
</style>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>where is flag??!!</title>
</head>
<body>


<div align=right class=lastmod>
Last Modified: <?php echo date(DATE_RFC822);?>
</div>

<h1>where is flag??!!</h1>

<br>
flag?!<br>
<br>
Try <a href="flag.php" title="flag">this</a>


<hr noshade>
<address>flag CMS~~~~</address>
</body>
</html>

<!--
if(isset($_GET['urls'])){
	$urls = $_GET['urls'];
	$url_host = parse_url($urls,PHP_URL_HOST);
	//Do something~~~~
	curl_get($urls);
}
-->