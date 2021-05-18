# 题目：Reverse2

### 题目描述：Simple xor

### 题目难度： 🌟🌟

### 维护：y0000cw

### KEY: `flag{Huan-y1n5-cAn5-5a1!}`

### 配置信息： 

​	1.开放端口： `80`

### 解题过程：

分析过程如下:
>  input  - 正确的输入  
>  tmp    - 程序中给定的数组  
>  tmp1   - 由input变换得来的数组1  
>  tmp2   - 由tmp1变换得来的数组2  
>  tmp3   - 由tmp和input变换得来的数组3  
>  tmp4   - 由tmp3和tmp2变换得来的数组4  
>  cipher - 程序中给定的密文,input经一系列变换后得到的tmp4必须跟此数组相等
```
tmp1[i] = input[i] ^ tmp1[i-1]	(tmp1[0] = 0x49)
tmp2[i] = tmp1[i] ^ tmp1[i+1] ^ 0x53	(tmp2[len-1] = tmp1[len-1)])
tmp3[i] = input[(i-1)%9] ^ input[(i-1)%7] ^ tmp[i-1]	(tmp3[0] = tmp[0])
tmp4[i] = tmp2[i] ^ tmp3[i]
```
> input  - 未知  
> tmp    - 已知  
> tmp1   - 未知  
> tmp2   - 未知  
> tmp3   - 未知  
> tmp4   - 已知(等于cipher)
> 1. 对tmp3进行简化,当(i-1)<7时,有 tmp3[i] = tmp[i-1],即tmp3的前7位已知  
> 2. 由tmp4[i] = tmp3[i] ^ tmp2[i], tmp2[i] = tmp4[i] ^ tmp3[i], 可以求得tmp2的前七位  
> 3. 又由tmp2[i] = tmp1[i] ^ tmp1[i+1] ^ 0x53,tmp1[i+1] = tmp2[i] + tmp1[i] ^ 0x53 tmp[0] 已知,可以求得tmp1的前八位  
> 4. tmp1[i] = input[i] ^ tmp1[i-1],input[i] = tmp[i] ^ tmp[i-1] 可求得input的前七位, 最后,由tmp3[i] = input[(i-1)%9] ^ input[(i-1)%7] ^ tmp[i-1] 求得完整的tmp3
> 5. 重复1-4,求得input

解密脚本:
```python
def init_t(t):
    t[0] = 0x61
    t[1] = 0x37
    t[2] = 0x73
    t[3] = 0x68
    t[4] = 0x77
    t[5] = 0x39
    t[6] = 0x6F
    t[7] = 0x31
    t[8] = 0x30
    t[9] = 0x65
    t[10] = 0x36
    t[11] = 0x33
    t[12] = 0x6E
    t[13] = 0x66
    t[14] = 0x69
    t[15] = 0x31
    t[16] = 0x39
    t[17] = 0x64
    t[18] = 0x6B
    return t


def init_c(c):
    c[0] = 0x47
    c[1] = 0x64
    c[2] = 0x18
    c[3] = 0x33
    c[4] = 0x10
    c[5] = 0x61
    c[6] = 0x51
    c[7] = 0x3B
    c[8] = 0x35
    c[9] = 0x5E
    c[10] = 0x63
    c[11] = 0x64
    c[12] = 0x1D
    c[13] = 0x74
    c[14] = 0x19
    c[15] = 77
    c[16] = 96
    c[17] = 27
    c[18] = 105
    return c


def calc_front_p(t, p):
    for i in range(1, 7):
        p[i] = t[i] ^ p[i-1]
    return p


def calc_b(c, p):
    tmp = c ^ p
    return tmp


def calc_a(a, b):
    tmp = a ^ b ^ 0x53
    return tmp


def calc_front_input(c,p):
    tmp = c ^ p ^ 0x53
    return tmp


def calc_full_input(a,t,p,c,input):
    res = ''
    res += chr(0x48)
    res += 'u'
    for i in range(1, 18):
        p[i] = t[i] ^ input[(i-1) % 9] ^ input[(i-1) % 7] ^ p[i-1]
        #print("p[%d]=t[%d]^input[%d]^input[%d]^p[%d]=%s^%s^%s^%s=%s"%(i,i,i%9,i%7,i-1,hex(t[i]),hex(input[i%9]),hex(input[i%7]),hex(p[i-1]),hex(p[i])))
        input[i+1] = p[i] ^ c[i] ^ 0x53
        #print("input[%d]=p[%d]^c[%d]^0x53=%s^%s^0x53=%s"%(i+1,i,i,hex(p[i]),hex(c[i]),hex(input[i+1])))
        res += chr(input[i+1])
    return res
#初始化输入数组input,input[0]为已知条件
input = ['\x01' for i in range(19)]
input[0] = 0x48
a = ['\x01' for i in range(19)]
a[0] = 0x49

#初始化初始数组经运算后的结果数组b
b = ['\x01' for i in range(19)]

#初始化异或数组t,t[0]-t[18]均为已知条件
t = ['\x01' for i in range(19)]
t = init_t(t)

#初始化抑或数组经运算后的结果数组p，p[0]为已知条件
p = ['\x01' for i in range(19)]
p[0] = 0x61

#初始化密文数组c，c[0]-c[18]均为已知条件
c = ['\x01' for i in range(19)]
c = init_c(c)

#第一步，通过p[i]=t[i]^input[i%9]^input[i%7]^p[i-1] 求得p[0]-p[6]
p = calc_front_p(t, p)

#第二步，通过c[i]=b[i]^p[i] -> b[i]=c[i]^p[i] 求得b[0]-b[6]
for i in range(7):
    b[i] = calc_b(c[i], p[i])

#第三步，通过b[i]=a[i]^a[i+1]^0x53 -> a[i]=a[i-1]^b[i-1]^0x53 求得a[1]-a[7]
for i in range(1, 8):
    a[i] = calc_a(a[i-1], b[i-1])

#第四步，通过a[i]=input[i]^a[i-1] -> input[i]=a[i]^a[i-1]  ->input[i]=(a[i-1]^b[i-1]^0x53)^a[i-1]
#-> input[i]=b[i-1]^0x53 ->inut[i]=(c[i-1]^p[i-1])^0x53 其中，c[i-1]为已知条件，p[0]-p[6]为已知条件，input[0]-input[7]为已知条件
#由上式可知，求得input的关键在于，解出完整的数组p，而数组p是由已知数组t以及input[0]-input[8]运算得来的
#有p[7]=t[7]^input[7]^input[0]^p[6] ->可解出p[7]
#input[8]=c[7]^p[7]^0x53 ->可解得input[8]
#再由input[8]解得p[8],p[8]解得input[9]，直至解出所有明文
for i in range(1, 8):
    input[i] = calc_front_input(c[i-1], p[i-1])
# print(c[7])
flag = calc_full_input(a, t, p, c, input)
print(flag)

```