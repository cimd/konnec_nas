#!/bin/bash
# read -p "Enter system's username: " user

#Ubuntu Deployment
echo "Ubuntu Updates"
sudo apt-get update && sudo apt-get -y upgrade
sudo apt install curl -y

#Apache
echo "Instaling Apache"
sudo apt install apache2 -y
sudo ufw app info "Apache Full"
sudo ufw allow in "Apache Full"

#Maria DB
echo "Installing MariaDB"
sudo apt install mariadb-server -y
sudo systemctl status mariadb

#PHP8
echo "Installing PHP8"
sudo apt install ca-certificates apt-transport-https software-properties-common -y
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update -y
sudo apt install -y php8.0 libapache2-mod-php8.0 php8.0-fpm libapache2-mod-fcgid php8.0-snmp php8.0-redis php8.0-mysql php8.0-mbstring php8.0-xml php8.0-zip php8.0-curl php8.0-gd
sudo a2enmod proxy_fcgi setenvif
sudo a2enconf php8.0-fpm
sudo systemctl restart apache2
#php -v

#Composer
echo "Installing Composer"
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
#composer --version
#composer global require laravel/installer

#Redis
echo "Installing Redis"
sudo apt install redis-server -y
sudo systemctl restart redis.service
sudo systemctl status redis