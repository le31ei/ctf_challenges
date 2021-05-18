# 题目：Crypto2

### 题目描述：凯撒加密

### 题目难度： 🌟

### 维护：SiJiDo

### KEY: `flag{e57b9e18b08bff0d05a3c59900b109a4}`

### 配置信息： 

​	1.开放端口： `8080`

### 解题过程：

将给出数字转换为ascii字符后得到：
mshn{l57i9l18i08imm0k05h3j59900i10???}tk5:742lh8152mm11i1m6m9314j3j4lmm93l
再通过凯撒密码进行解密，当偏移量为7时，得到：
flag{e57b9e18b08bff0d05a3c59900b10???}
MD5:742ea8152ff11b1f6f9314c3c4eff93e
在根据MD5值爆破出flag值为：
flag{e57b9e18b08bff0d05a3c59900b109a4}