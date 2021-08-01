#!/bin/bash

#Apache
echo "Instaling Apache"
sudo apt install apache2 -y
sudo a2enmod rewrite headers env dir setenvif ssl expires proxy_fcgi
sudo a2enconf php7.4-fpm

sudo ufw app info "Apache Full"
sudo ufw allow in "Apache Full"