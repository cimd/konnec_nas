#!/bin/bash
# read -p "Enter system's username: " user
GREEN='\033[0;32m'
NC='\033[0m' # No Color


#Maria DB
echo -e "${GREEN}Installing MariaDB${NC}"
apt install mariadb-server -y
# systemctl status mariadb
mysql -u root -e "create user admin@localhost identified by 'admin';"
mysql -u root -e "GRANT ALL privileges ON *.* TO 'admin'@localhost;"
mysql -u root -e "flush PRIVILEGES;"

# Setup Backups
# automysqlbackup
# nano /etc/default/automysqlbackup
