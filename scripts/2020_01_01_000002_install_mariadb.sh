#!/bin/bash
# read -p "Enter system's username: " user

#Maria DB
echo "Installing MariaDB"
sudo apt install mariadb-server -y
# sudo systemctl status mariadb
sudo mysql -u root -e "create user admin@localhost identified by 'cimD1980';"
sudo mysql -u root -e "GRANT ALL privileges ON *.* TO 'admin'@localhost;"
sudo mysql -u root -e "flush PRIVILEGES;"