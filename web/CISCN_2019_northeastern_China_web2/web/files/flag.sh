#!/bin/bash

sed -i "s/flag{123456}/$FLAG/g" /var/www/html/db.sql

export FLAG=not_flag
FLAG=not_flag

rm -f /flag.sh
