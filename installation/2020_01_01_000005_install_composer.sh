#!/bin/bash
# read -p "Enter system's username: " user
GREEN='\033[0;32m'
NC='\033[0m' # No Color

#Composer
echo -e "${GREEN}Installing Composer${NC}"
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer