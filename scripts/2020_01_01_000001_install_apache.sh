#!/bin/bash

#Apache
echo "Instaling Apache"
sudo apt install apache2 -y
sudo a2enmod rewrite headers env dir mime setenvif ssl expires
sudo ufw app info "Apache Full"
sudo ufw allow in "Apache Full"