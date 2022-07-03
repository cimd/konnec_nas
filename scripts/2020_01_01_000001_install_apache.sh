#!/bin/bash

#Apache
echo -e "${GREEN}Instaling Apache${NC}"
sudo apt install apache2 -y
sudo a2enmod rewrite headers env dir setenvif ssl expires proxy_fcgi
sudo ufw app info "Apache Full"
sudo ufw allow in "Apache Full"