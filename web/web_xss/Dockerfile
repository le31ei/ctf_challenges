FROM php:7.2-apache

LABEL maintainer="le31ei <le31ei@qq.com>"
ADD ./tmp /tmp/tmp/
ADD ./wait-for-it.sh /
EXPOSE 80

RUN set -ex \
    && echo " \
    deb http://mirrors.aliyun.com/debian/ buster main non-free contrib\n \
    deb-src http://mirrors.aliyun.com/debian/ buster main non-free contrib\n \
    deb http://mirrors.aliyun.com/debian-security buster/updates main\n \
    deb-src http://mirrors.aliyun.com/debian-security buster/updates main\n \
    deb http://mirrors.aliyun.com/debian/ buster-updates main non-free contrib\n \
    deb-src http://mirrors.aliyun.com/debian/ buster-updates main non-free contrib\n \
    deb http://mirrors.aliyun.com/debian/ buster-backports main non-free contrib\n \
    deb-src http://mirrors.aliyun.com/debian/ buster-backports main non-free contrib\n" > /etc/apt/sources.list \
    && apt-get update \
    && apt-get install -y python python-pip supervisor mariadb-client libfontconfig libssl-dev \
    && docker-php-ext-install mysqli

RUN cd /tmp/tmp \
    && pip install selenium==2.48.0 -i https://pypi.douban.com/simple \
    && tar -xjvf phantomjs-2.1.1-linux-x86_64.tar.bz2 \
    && ln -s /tmp/tmp/phantomjs-2.1.1-linux-x86_64/bin/phantomjs /usr/local/bin/phantomjs

ADD ./docker-entrypoint.sh /


RUN chmod +x /docker-entrypoint.sh

RUN chmod +x /wait-for-it.sh

ENTRYPOINT [ "/docker-entrypoint.sh" ]