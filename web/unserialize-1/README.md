# 题目：反序列化

### 题目描述：简单的反序列化

### 题目难度： 🌟🌟

### 维护：le31ei

### KEY: `flag{6b9260b1e02041a665d4e4a5117cfe16}`

### 配置信息： 
1. 开放端口： `8080`

### 解题过程：

1. index.php中存在反序列化漏洞，在销毁对象时存在include文件包含，可通过php伪协议读取flag.php文件内容

```php
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

    public function __destruct()
    {
        include($this->file);
    }
}
```

