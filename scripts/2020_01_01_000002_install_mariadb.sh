#!/bin/bash
# read -p "Enter system's username: " user

#Maria DB
echo "Installing MariaDB"
sudo apt install mariadb-server -y
# sudo systemctl status mariadb
sudo mysql -u root -e "create user admin@localhost identified by 'admin'; \
exit;"