<?php
function geturl($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        echo $output;
}

if(isset($_GET['url'])){
	geturl($_GET['url']);
}
else{
	header("Location: index.php?url=http://www.baidu.com");
}

echo "<!-- 偷偷告诉你,flag在根目录下的flag.txt中 -->";