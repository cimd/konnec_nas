#!/bin/bash

#PHP 7.4
echo "Installing PHP 7.4"
# sudo apt install ca-certificates apt-transport-https software-properties-common -y
# sudo add-apt-repository ppa:ondrej/php -y
# sudo apt update -y
sudo apt install -y \
php libapache2-mod-php php-fpm libapache2-mod-fcgid \
php-snmp php-redis php-mysql php-mbstring php-xml \
php-zip php-curl php-gd
sudo a2enmod proxy_fcgi setenvif
sudo a2enconf php-fpm
sudo systemctl restart apache2