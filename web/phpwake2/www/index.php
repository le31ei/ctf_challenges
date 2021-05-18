<?php
error_reporting(0);
include 'fl4g.php';

if($_REQUEST['mode']!="begin"){
    show_source(__FILE__);
    die("PHP Games!");
}else{
    class last_task{
        var $left;
        var $middle;
        var $right;
    }
    $a=$_GET['a'];
    $b=$_GET['b'];
    if($a==$b){
        die("wrong way");
    }else{
        if(md5($a)!=sha1($b)){
            die("need a little magic");
        }else{
            if($_POST['token']){
                $token = unserialize($_POST['token']);
                if($token['user']=="user"&&$token['pass']=="pass"){
                        $flag=$_POST['flag'];
                        if($flag){
                            $flag = unserialize(urldecode($flag));
                            $flag->middle = $fl4g;
                            if($flag->middle===$flag->left&&$flag->middle===$flag->right){
                                echo "this is your flag ".$flag->middle;
                            }else{
                                die("one more step");
                            }
                        }else{
                            die("don't give up");
                        }
                }else{
                    die("Not a valid token");
                }
            }else{
                die("give me the token");
            }
        }
    }
}
?>