#!/bin/bash

GREEN='\033[0;32m'
NC='\033[0m' # No Color

#Ubuntu Deployment
echo -e "${GREEN}Adding PPAs${NC}"

# PHP
sudo add-apt-repository ppa:ondrej/php -y

# Webmin
curl -fsSL https://download.webmin.com/jcameron-key.asc | sudo gpg --dearmor -o /usr/share/keyrings/webmin.gpg
echo "deb [signed-by=/usr/share/keyrings/webmin.gpg] http://download.webmin.com/download/repository sarge contrib" \
>> /etc/apt/sources.list





sudo apt update
sudo apt upgrade -y