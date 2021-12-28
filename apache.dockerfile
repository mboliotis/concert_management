FROM php:7.4-apache
RUN apt update
RUN apt -y upgrade
RUN apt install libssl-dev 
RUN pecl install mongodb
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
RUN echo "extension=mongodb.so" > "$PHP_INI_DIR/php.ini"
RUN  apt -y install git
RUN apt -y install zip unzip 
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php 
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN composer require mongodb/mongodb
