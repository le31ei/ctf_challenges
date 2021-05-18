# 题目：Crypto4

### 题目描述：rsa基础

### 题目难度： 🌟🌟

### 维护：SiJiDo

### KEY: `flag{1e257b39a25c6a7c4d66e197}`

### 配置信息： 

​	1.开放端口： `8080`

### 解题过程：

1.使用factordb分解n，得到3个数，运用相关数学推导，编写exp，运行即可得到flag。

```
import libnum
import gmpy2
q=782758164865345954251810941
p=810971978554706690040814093
r=1108609086364627583447802163
e= 59159
c= 449590107303744450592771521828486744432324538211104865947743276969382998354463377
n= 703739435902178622788120837062252491867056043804038443493374414926110815100242619
phi_n = (p-1)*(q-1)*(r-1)
d = gmpy2.invert(e,phi_n)
print libnum.n2s(pow(c,d,n))
```
