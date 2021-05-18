# -*- coding: utf-8 -*-
class RC4:
    def __init__(self,public_key = None):
        if not public_key:
            public_key = 'none_public_key'
        self.public_key = public_key
        self.index_i = 0
        self.index_j = 0
        self._init_box()

    def _init_box(self):
        """
        初始化 置换盒
        """
        self.Box = [i for i in range(256)]
        key_length = len(self.public_key)
        j = 0
        for i in range(256):
            index = ord(self.public_key[(i % key_length)])
            j = (j + self.Box[i] + index ) % 256
            self.Box[i],self.Box[j] = self.Box[j],self.Box[i]
        # for i in range(256):


    def do_crypt(self,string):
        """
        加密/解密
        string : 待加/解密的字符串
        """

        out = []
        test=[]
        #print(len(string))
        for s in string:
            self.index_i = (self.index_i + 1) % 256
            self.index_j = (self.index_j + self.Box[self.index_i]) % 256
            self.Box[self.index_i], self.Box[self.index_j] = self.Box[self.index_j],  self.Box[self.index_i]

            r = (self.Box[self.index_i] + self.Box[self.index_j]) % 256
            R = self.Box[r] # 生成伪随机数
            tmp=ord(s)^R
            test.append(tmp)
            out.append(chr(tmp))
        #print(test)
        #print(len(test))
        return ''.join(out)
