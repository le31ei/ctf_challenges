# 题目：chall

### 题目描述：安卓逆向咯

### 题目难度： 🌟🌟🌟

### 维护：SiJiDo

### KEY: `flag{048b749d30}`

### 配置信息： 

​	1.开放端口： `8080`

### 解题过程：

Java层里有检测Xposed、模拟器和签名检查，视情况可以patch掉或者重打包全删掉。
逆向主函数，发现flag检查逻辑在native的flag1函数，因此需要逆向native。
静态逆向较难，动态调试一下发现会秒退 ，搜索字符串可以发现反调试线程，先将其patch掉。
根据native函数命名规则找到Java_edu_fudan_debugme_MainActivity_flag1函数，在其中下断点，但发现并没有进来，猜测是在JNIOnload搞了鬼，可以发现做了动态绑定，找到了RegisterNatives调用，其中注册了5个函数，函数名被加密过，动态调试可以找到flag1绑定的函数是O0O00OO0OOO00O0。
进一步逆向该函数，函数将输入做了两个加密运算并与一串值进行比较。第一个较为容易逆向，是RC4加密。第二个有经验可以发现是RC6加密，不知道的话花点时间也可以写出逆运算。两个加密的密钥都是常量，因此可以直接求解，解密后即得到flag
