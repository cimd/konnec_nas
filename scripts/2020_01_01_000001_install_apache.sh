#!/bin/bash
GREEN='\033[0;32m'
NC='\033[0m' # No Color

#Apache
echo -e "${GREEN}Instaling Apache${NC}"
sudo apt install apache2 -y
sudo a2enmod rewrite headers env dir setenvif ssl expires proxy_fcgi
sudo ufw app info "Apache Full"
sudo ufw allow in "Apache Full"