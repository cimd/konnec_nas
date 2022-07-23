#!/bin/bash

#PHP 8.1
echo "Installing PHP 8.1"
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update
sudo apt upgrade -y
sudo apt install -y php8.1 libapache2-mod-php8.1 php8.1-fpm libapache2-mod-fcgid php8.1-snmp php8.1-redis php8.1-mysql php8.1-mbstring php8.1-xml php8.1-zip php8.1-curl php8.1-gd
sudo apt install -y php8.1-swoole
sudo a2enmod proxy proxy_http proxy_fcgi setenvif ssl expires headers mpm_event rewrite
sudo a2enconf php8.1-fpm
