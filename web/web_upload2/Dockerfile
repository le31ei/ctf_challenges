FROM php:5.4-apache

COPY src/ /var/www/html/

COPY flag/ /

RUN chmod -R 655 /var/www/html/ \
    && chmod -R 777 /var/www/html/ 
