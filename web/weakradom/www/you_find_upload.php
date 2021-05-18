
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
                    <li ><a href="ping.php">ping</a></li>
                    <li ><a href="you_find_upload.php?p=php://filter/convert.base64-encode/resource=you_find_upload">查看源码</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>
<div class="container">
    <h1>yes! you find it</h1>
    <form action="you_find_upload.php" method="POST" enctype="multipart/form-data">
        <label>Select image to upload:</label>
        <input type="file" name="file">
        <button type="submit" class="btn" name="submit">upload</button>
        <pre>
        <?php
        $type = array('gif','jpg','png');
        mt_srand((time() % rand(1,100000)%rand(1000,9000)));
        echo mt_rand();
        if (isset($_POST['submit'])) {
            $check = getimagesize($_FILES['file']['tmp_name']);
            @$extension = end(explode('.',$_FILES['file']['name']));
            if(in_array($extension,$type)){
                echo 'File is an image - ' . $check['mime'];
                $filename = '/var/www/html/web1/upload/'.mt_rand().'_'.$_FILES['file']['name']; 
                move_uploaded_file($_FILES['file']['tmp_name'], $filename);
                echo "<br>\n";
            } else {
                echo "File is not an image";
            }
        }
        if(isset($_GET['p'])){
            if(@preg_match("/\.\.\//",$_GET['p'])){
                echo "你这个孩子，too young too simple";
            }
            else{
               @include $_GET['p'].".php";
            }
        }
        ?>
    </pre>
    </form>
</div> <!-- /container -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="./js/jquery-3.2.1.min.js"></script>

</body>
</html>

