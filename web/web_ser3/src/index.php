<?php

class DemoX{
    protected $user;
    protected $sex;
    function __construct(){
        $this->user = "guest";
        $this->sex = "male";
    }

    function __wakeup(){
        $this->user = "Guest";
        $this->sex = "female";
    }

    function __toString(){
        return "<br>you are " . $this->user . ", your sex is " . $this->sex . "<br>";
    }

    function __destruct()
    {
        echo $this;
    }
}

class Demo2{
    private $fffl4g;

    function __construct($file){
        $this->fffl4g = $file;
    }

    function __toString(){
        return file_get_contents($this->fffl4g);
    }
}

if(!isset($_GET['poc'])){
    highlight_file("index.php");
}
else{
    $user = unserialize($_GET['poc']);
}
