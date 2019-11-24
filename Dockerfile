FROM php:7.2-apache
#ENV PORT 95
COPY ./public_html/ /var/www/html
COPY ./conf/php.ini-production $PHP_INI_DIR/php.ini-production
COPY ./conf/php.ini-development $PHP_INI_DIR/php.ini-development
COPY ./conf/ports.conf /etc/apache2
RUN mv $PHP_INI_DIR/php.ini-development  $PHP_INI_DIR/php.ini
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_mysql pdo_pgsql
RUN chmod -R 755 /var/www/html
EXPOSE 95


