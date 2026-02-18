FROM php:8.2-apache

# install postgres libraries
RUN apt-get update && apt-get install -y libpq-dev

# install php postgres extensions
RUN docker-php-ext-install pdo pdo_pgsql pgsql

# copy project files
COPY . /var/www/html/

EXPOSE 80
