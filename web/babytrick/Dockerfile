FROM php:5.6.10-apache

LABEL maintainer="le31ei <le31ei@qq.com>"

ADD ./wait-for-it.sh /

ADD ./docker-entrypoint.sh /

RUN chmod +x /wait-for-it.sh

RUN chmod +x /docker-entrypoint.sh

RUN docker-php-ext-install mysql

ENTRYPOINT [ "/docker-entrypoint.sh" ]