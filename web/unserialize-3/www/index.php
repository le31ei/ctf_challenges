<?php  
error_reporting(0);
include("flag.php");

class Flag{ 
    public $file;  
    public function __tostring(){  
        if(isset($this->file)){  
            echo file_get_contents($this->file); 
            echo "<br>";
            return ("good");
        }  
    }  
}

$txt = $_GET["txt"];
$password = $_GET["password"];  

if(!isset($txt)){
    show_source(__FILE__);
    exit();
}

if(file_get_contents($txt,'r')==="welcome to the aegis"){  
    echo "hello friend!<br>";    
    $password = unserialize($password);  
    echo $password;  
}else{  
    echo "something wrong! try it again";  
}
  
?>