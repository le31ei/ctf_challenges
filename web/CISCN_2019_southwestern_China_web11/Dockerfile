FROM ctftraining/base_image_nginx_php_73

LABEL Author="glzjin <i@zhaoj.in>" Blog="https://www.zhaoj.in"

COPY ./files /tmp/
RUN cp -rf /tmp/html/ /var/www/ && \
    cp -rf /tmp/flag.sh / && \
    chown -R www-data:www-data /var/www/html/api/templates_c && \
    chown -R www-data:www-data /var/www/html/templates_c && \
    chown -R www-data:www-data /var/www/html/xff/templates_c && \
    rm -rf /tmp/
