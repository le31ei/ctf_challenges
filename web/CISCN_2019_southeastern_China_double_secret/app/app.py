#!/usr/bin/env python3
# -*- coding: utf-8 -*-
#This .py gives flask ssti loophole
from flask import Flask
from flask import render_template
from flask import request
from flask import render_template_string
import rc4_Modified

app=Flask(__name__)

@app.route('/')
def hello():
    return 'Welcome To Find Secret'

@app.route('/robots.txt')
def robots():
    return 'It is Android ctf'


@app.route('/secret',methods=['GET','POST'])
def secret():
    def safe(s):
        black=['class','mro','subclasses','read','args','form','write', 'mro',  '<', '>', '|', 'join' 'os', 'sys', 'pop', 'del', 'rm', 'eval', 'exec', 'ls', 'cat', ';', '&&', 'catch_warnings', 'func_globals', 'pickle', 'import', 'subprocess', 'commands', 'input', 'execfile', 'reload', 'compile', 'execfile', 'kill', 'func_code' ]
        for i in black:
            if i in s:
                return '\''+i+'\' is not allowed. Secret is '+s
        return s
    secret=request.args.get('secret')
    if(secret==None):
        return 'Tell me your secret.I will encrypt it so others can\'t see'
    rc=rc4_Modified.RC4("HereIsTreasure")   #解密
    deS=rc.do_crypt(secret)

    a=render_template_string(safe(deS))

    if 'ciscn' in a.lower():
        return 'flag detected!'
    return a

if __name__=='__main__':
    app.run(
        debug=True,
        host="0.0.0.0"
    )
