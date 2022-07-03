#!/bin/bash
# read -p "Enter system's username: " user
GREEN='\033[0;32m'
NC='\033[0m' # No Color


#Maria DB
echo -e "${GREEN}Installing MariaDB${NC}"
sudo apt install mariadb-server automysqlbackup -y
# sudo systemctl status mariadb
sudo mysql -u root -e "create user admin@localhost identified by 'konnec';"
sudo mysql -u root -e "GRANT ALL privileges ON *.* TO 'admin'@localhost;"
sudo mysql -u root -e "flush PRIVILEGES;"

# Setup Backups
sudo automysqlbackup
# sudo nano /etc/default/automysqlbackup