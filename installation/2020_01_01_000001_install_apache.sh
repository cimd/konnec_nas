#!/bin/bash
GREEN='\033[0;32m'
NC='\033[0m' # No Color

#Apache
echo -e "${GREEN}Instaling Apache${NC}"
apt install apache2 -y
a2enmod rewrite headers env dir setenvif ssl expires proxy_fcgi
ufw app info "Apache Full"
ufw allow in "Apache Full"