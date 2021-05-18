# 题目：百度搜索

### 题目描述：我写了一个网站调用了百度搜索，感觉很高大上哈哈哈

### 题目难度： 🌟

### 维护：SiJiDo

### KEY: `NSCTF{4787370fb09bd230f863731d2ffbff6a}`

### 配置信息： 

1. 开放端口： `10004`

### 解题过程：

1. 查看源码发现提示flag.txt在根目录
2. 利用file协议读取flag.txt, `http://xxx.xxx.xxx.xxx/?url=file:///flag.txt`

