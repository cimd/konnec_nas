#!/bin/bash
GREEN='\033[0;32m'
NC='\033[0m' # No Color

# Create Database
echo -e "${GREEN}Creating Database${NC}"
sudo mysql -u root -e "create database konnec_nas; \
grant all privileges on konnec_nas.* to admin@localhost identified by 'konnec'; \
flush privileges;"

# Install Laravel
echo -e "${GREEN}Installing Konnec NAS${NC}"
sudo cp -r ./konnec_nas /var/www/
# mkdir /var/www/konnec_nas/storage/framework/sessions /var/www/konnec_nas/storage/framework/views /var/www/konnec_nas/storage/framework/cache
sudo cp /var/www/konnec_nas/.env.example /var/www/konnec_nas/.env
sudo mkdir /var/www/konnec_nas/storage/temp
sudo chmod -R 777 /var/www/konnec_nas/storage

sudo composer config --working-dir=/var/www/konnec_nas --no-interaction http-basic.nova.laravel.com christian.daquino@gmail.com qHjBb3JN9ZWFo8G0w4qEyt94cHQhOaBMgUvl33aLk2wd1yrFgK
sudo composer install --working-dir=/var/www/konnec_nas --optimize-autoloader --no-interaction
# mariadb -u root -p   /var/www/konnec_nas/database-setup.sql
sudo php /var/www/konnec_nas/artisan key:generate
sudo php /var/www/konnec_nas/artisan migrate --seed --force
sudo php /var/www/konnec_nas/artisan config:cache
sudo php /var/www/konnec_nas/artisan route:cache
sudo php /var/www/konnec_nas/artisan view:cache
sudo php /var/www/konnec_nas/artisan event:cache

echo -e "${GREEN}Setting Apache Server${NC}"
sudo cp ~/konnec_nas/setup/apache/konnec-api.conf /etc/apache2/sites-available
sudo cp ~/konnec_nas/setup/apache/konnec.conf /etc/apache2/sites-available
sudo a2ensite konnec-api.conf
sudo a2ensite konnec.conf
sudo systemctl reload apache2

#Supervisor
echo -e "${GREEN}Configuring Supervisor${NC}"
sudo cp /var/www/konnec_nas/setup/workers/horizon-worker.conf /etc/supervisor/conf.d
# cp /var/www/konnec_nas/setup/workers/octane-worker.conf /etc/supervisor/conf.d

sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start all

# CRON Job
echo -e "${GREEN}Setup CRON jobs${NC}"
echo "* * * * * php /var/www/konnec_nas/artisan schedule:run > '/dev/null' 2>&1" >> /etc/crontab

