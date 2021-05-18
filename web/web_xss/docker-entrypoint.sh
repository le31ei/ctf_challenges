#!/bin/sh

set -ex

cd /

./wait-for-it.sh -t 0 mysql:3306 -- echo "mysql is up"


mysql -uxss -pxss -h mysql xss -e "source /var/www/html/db.sql;" 

nohup sh /tmp/tmp/bot.sh &

/usr/sbin/apache2ctl -D FOREGROUND