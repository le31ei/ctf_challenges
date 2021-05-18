<?php
include "flag.php";
class Index{
	private $name1;
	private $name2;
	protected $age1;
	protected $age2;

	function getflag($flag){
		$name2 = rand(0,999999999);
		if($this->name1 === $this->name2){
			$age2 = rand(0,999999999);
			if($this->age1 === $this->age2){
				echo $flag;
			}
		}
		else{
			echo "nonono";
		}
	}
}
if(isset($_GET['poc'])){
	$a = unserialize($_GET['poc']);
	$a->getflag($flag);
}
else{
	highlight_file("index.php");
}
?>