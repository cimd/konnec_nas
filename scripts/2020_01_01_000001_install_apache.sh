#!/bin/bash

#Apache
echo "Instaling Apache"
sudo apt install apache2 -y
sudo ufw app info "Apache Full"
sudo ufw allow in "Apache Full"