FROM php:5.6-apache

LABEL maintainer="le31ei <le31ei@qq.com>"

COPY ./files/html.zip /
COPY ./files/tmp_html.zip /

COPY ./docker-entrypoint.sh /

RUN chmod +x /docker-entrypoint.sh

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
    && apt-get install -y unzip 

RUN docker-php-ext-install mysql 

ENTRYPOINT [ "/docker-entrypoint.sh" ]