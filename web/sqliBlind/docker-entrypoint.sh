#!/bin/sh

set -ex

cd /

./wait-for-it.sh -t 0 db:3306 -- echo "mysql is up"


mysql -usqli -psqli -h db sqli -e "source /tmp/db.sql;" 


/usr/sbin/apache2ctl -D FOREGROUND