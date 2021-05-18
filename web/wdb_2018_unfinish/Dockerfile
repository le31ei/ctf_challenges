FROM php:5.6-apache

LABEL maintainer="le31ei <le31ei@qq.com>"

RUN docker-php-ext-install mysql

RUN chown -R root:root /var/www/html/ && \
    chmod -R 777 /var/www/html/ && \
    chmod -R +t /var/www/html/
