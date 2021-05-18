#!/bin/bash
set -ex
mkdir /home/www/
unzip -oq /html.zip -d /var/www/
echo "www:x:500:500:www:/home/www:/bin/bash" >> /etc/passwd
echo "Y2QgL3RtcC8KdW56aXAgaHRtbC56aXAKcm0gLWYgaHRtbC56aXAKY3AgLXIgaHRtbCAvdmFyL3d3dy8KY2QgL3Zhci93d3cvaHRtbC8Kcm0gLWYgLkRTX1N0b3JlCnNlcnZpY2UgYXBhY2hlMiBzdGFydAo=" |base64 -d > /home/www/.bash_history
chmod -R 777 /home/www/

unzip -oq /tmp_html.zip -d /tmp && \
chmod -R 777 /tmp/html/

/usr/sbin/apache2ctl -D FOREGROUND