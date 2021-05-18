# 题目：upload&include

### 题目描述：文件包含与上传合并利用

### 题目难度： 🌟🌟

### 维护：SiJiDo

### KEY: `flag{eb5adf98370751fe5c01e371bcefadd1}`

### 配置信息： 

1. 开放端口： `8080`

### 解题过程：

1. 看源码有include.php的提示
2. 访问include.php，告知存在file参数，文件包含，自带`.php`后缀
3. 扫描发现upload.php
4. 上传压缩包压缩包内包含一句话木马的php文件，修改压缩包为jpg后缀和Contents-type为image/jpeg
5. 包含`http://xxx.xxx.xxx.xxx/include.php?file=zip://upload/1.jpg%23eval`

