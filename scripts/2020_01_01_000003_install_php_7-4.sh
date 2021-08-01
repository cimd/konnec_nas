#!/bin/bash

#PHP 7.4
echo "Installing PHP 7.4"
sudo apt install -y \
php libapache2-mod-php php7.4-fpm libapache2-mod-fcgid \
php-snmp php-redis php-mysql php-mbstring php-xml \
php-zip php-curl php-gd php-bcmath php-gmp php-imagick imagemagick
sudo a2enmod proxy_fcgi setenvif
sudo a2enconf php7.4-fpm
sudo systemctl restart apache2