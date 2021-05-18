<?php
include "flag.php";

class Connection
{
    public $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function __sleep()
    {
        $this->file = 'sleep.txt';
        return array('file');
    }

    public function __wakeup()
    {
        $this->file = 'wakeup.txt';
    }

    public function __destruct()
    {
        include($this->file);
    }
}

if (isset($_GET['un'])) {
    $obj2 = unserialize($_GET['un']);
} else {
    highlight_file(__file__);
}
