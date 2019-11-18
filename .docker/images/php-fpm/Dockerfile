FROM php:7.3-fpm-alpine

# Install composer package manager
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
 && php composer-setup.php --filename=composer --install-dir=\/usr\/local\/bin \
 && php -r "unlink('composer-setup.php');"


# Copy php-fpm config files
COPY ./php.ini /usr/local/etc/php/conf.d/php.ini


WORKDIR /var/www/backend

CMD ["php-fpm"]