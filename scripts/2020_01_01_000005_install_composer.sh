#!/bin/bash
# read -p "Enter system's username: " user

#Composer
echo -e "${GREEN}Installing Composer${NC}"
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer