# 题目：CISCN 2019 华东南 Web4

### 题目描述：none

### 题目难度： 🌟🌟🌟🌟🌟

### 维护：le31ei

### KEY: `flag{glzjin_wants_a_girl_firend}`

### 配置信息： 
1. 开放端口： `8083`

### 解题过程：

1. 任意文件读取、伪随机数
2. http://web55.buuoj.cn/read?url=app.py 读源码
2. http://web55.buuoj.cn/read?url=/sys/class/net/eth0/address 读网卡地址
3. 用 exp 下面的脚本来算出 SECRET_KEY，并重新签名。（Python2，和靶机一致）
4. 置 session Cookie，访问 http://web55.buuoj.cn/flag
