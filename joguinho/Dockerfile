FROM  php:8-apache

WORKDIR /var/www/html/

COPY . .

EXPOSE 80

RUN chown -R www-data:www-data /var/www

#RUN php -m | grep pdo_mysql

#RUN sudo apt-get install php-mysql

#RUN sudo systemctl restart apache2 | sudo systemctl restart httpd 

RUN docker-php-ext-install pdo pdo_mysql



