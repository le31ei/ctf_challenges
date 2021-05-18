<?php
include("flag.php");
session_start();
if(isset($_GET['code']) && intval($_GET['code'])===$_SESSION['code'])die($flag);
    else{echo "wrong answer!";}
srand(rand(0,1000));
for($i=0;$i<3;$i++)
    echo "<h3>randnum$i:".rand(0,1000)."</h3><br>";
$_SESSION['code']=rand(0,1000);
?>
<form action="" method="get">
the next random num is:<input type="text" name="code"/>
<input type="submit"/>
</form>