#!/bin/bash

#PHP 8.3
echo "Installing PHP8"
sudo apt update -y
sudo apt install -y php8.3 libapache2-mod-php8.3 php8.3-fpm libapache2-mod-fcgid php8.3-snmp php8.3-redis
sudo apt install -y php8.3-mysql php8.3-mbstring php8.3-xml php8.3-zip php8.3-curl php8.3-gd php8.3-swoole
sudo apt install -y php8.3-intl php8.3-bcmath
sudo a2enmod proxy proxy_http proxy_fcgi setenvif ssl expires headers mpm_event rewrite http2
sudo a2enconf php8.3-fpm
# sudo nano /etc/php/8.3/cli/php.ini
# change php memory_limit=512M
sudo systemctl restart apache2
