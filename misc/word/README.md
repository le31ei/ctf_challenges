# 题目：MSIC4

### 题目描述：流量分析

### 题目难度： 🌟🌟

### 维护：SiJiDo

### KEY: `flag{7eb5c20fc7285a4e1d6e70}`

### 配置信息： 

1.文件比较大
链接: https://pan.baidu.com/s/14qabRh0aSrjqvCY1RPH43g 
提取码: krps 

### 解题过程：

1.拿到一个磁盘镜像，加载可以得到key文件夹中的9张图片和一个文本文件。

可以看出9张图片是一个二维码的切片，根据二维码的功能图形结合手动对齐可以还原：

2.扫描得到：

Here is the AES key to decrypt our secret, please remember it carefully: "7h3_s3cR37_k3Y!!"

另外由文本文件可知，secret被删除了，我们可以先尝试binwalk，但没有得到有用信息。

使用Autopsy等取证工具可以看到被删除的文件

3.把文件保存出来，使用010editor打开，发现其文件头是PNG，但后面的数据明显对不上。结合文本和后面的fmt和data可知这其实是个wav文件，只是文件头被改了，可以找一个正常的wav文件对照着修复掉。（PNG换成RIFF，IHDR换成WAVE）

修复完成后打开wav可以听出是摩斯密码。由于文件很长，可以找份脚本进行解密，也可以在线解密等

4.解密后得到一长串数字和字母，由于摩斯密码没有大小写，猜测是BASE32编码，解码得到一张图片。打开图片没有明显信息。尝试LSB隐写，得到4W9Om/5sT8JMRy9KGGvOtK+vqRPF46kfbRlV1RJSRiY=

使用之前扫描二维码得到的AES key解密。

这里可以在线解密http://tool.chacuo.net/cryptaes，也可以用python等：

```
from Crypto.Cipher import AES
c = AES.new('7h3_s3cR37_k3Y!!', AES.MODE_ECB)
print c.decrypt('4W9Om/5sT8JMRy9KGGvOtK+vqRPF46kfbRlV1RJSRiY='.decode('base64')) 
```

