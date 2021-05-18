

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="./css/bootstrap.css" rel="stylesheet">
    <style>
        body {
            padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
        }
    </style>
    <link href="./css/bootstrap-responsive.css" rel="stylesheet">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="./ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="./ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="./ico/favicon.png">
</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="#">net工具体验</a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li ><a href="index.php">Home</a></li>
                    <li class="active"><a href="ping.php">ping</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>
<div class="container">
    <h1>输入格式:*.*.*.*</h1>
    <form action="ping.php" method="get">
        <fieldset>
            <label>ping attack</label>
            <input type="text" name= "ip" placeholder="127.0.0.1">
            <span class="help-block"></span>

<pre>
<?php
$pat = "/^(((1?\d{1,2})|(2[0-4]\d)|(25[0-5]))\.){3}((1?\d{1,2})|(2[0-4]\d)|(25[0-5]))/";

if(isset($_GET['ip'])) {
    $ip = $_GET['ip'];
    if (empty($_GET['ip'])) {
        echo("空IP你让我打你啊");
    }
    elseif (preg_match("/[`;$()| \/\'>\"\t]/", $ip)) {
        echo("你这样是要挨打的啊");
    }
    elseif(!preg_match($pat,$ip)){
        echo "ip格式不对你打啥";
    }
    elseif(strlen($ip)>13){
        echo "字符串太长了啊";
    }
    else{
        @system("ping -c 2 $ip ");
    }
}
//else if ()
//@system("ping -c 3 $ip");
//?>


</pre>
            <button type="submit" class="btn">Submit</button>
        </fieldset>
    </form>

</div> <!-- /container -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="./js/jquery-3.2.1.min.js"></script>

</body>
</html>

