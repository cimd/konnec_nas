#!/bin/bash
# read -p "Enter system's username: " user

#Composer
echo "Installing Composer"
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer