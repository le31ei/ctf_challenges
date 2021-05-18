# 题目：Reverse3

### 题目描述：逆向逆向,请在最终答案上加上`flag{}`,最终提交格式为`flag{你获得的值}`

### 题目难度： 🌟🌟

### 维护：SiJiDo

### KEY: `flag{ActI0n5_sp3ak_Louder_than_w0rds}`

### 配置信息： 

​	1.开放端口： `8080`

### 解题过程：

```
import base64
a = "OFG{OxS3Lha6MUDk[0PnXofmcUrp`E3w`1@zalL2fZX1gJn4SWHFPGTEP2jHQivOVW7RWDDQW3PTTnf[UTmjSAOiHT6oIkerZ{q?"

b = "bEBn`GBkMV{fJyMLTF{yR@sQVjUNIoULJVtsN@UQ[d>>"

aa = ''
for i in range(len(a)):
    aa += chr(ord(a[i])^2)

aa = base64.b64decode(aa)
print aa

bb = ''
for i in range(len(b)):
    bb += chr(ord(b[i])^3)

bb = base64.b64decode(bb)
print bb

r = ''
for i in range(len(bb)):
    r += chr(aa.index(bb[i])+48)
print r
```

