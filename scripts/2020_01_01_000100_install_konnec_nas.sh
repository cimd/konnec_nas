#!/bin/bash

# Create Database
echo -e "${GREEN}Creating Database${NC}"
mysql -u root -e "create database konnec_nas; \
grant all privileges on konnec_nas.* to admin@localhost identified by 'konnec'; \
flush privileges;"

# Install Laravel
echo -e "${GREEN}Installing Konnec NAS${NC}"
cp -r ~/konnec_nas /var/www/
# mkdir /var/www/konnec_nas/storage/framework/sessions /var/www/konnec_nas/storage/framework/views /var/www/konnec_nas/storage/framework/cache
cp /var/www/konnec_nas/.env.example /var/www/konnec_nas/.env
chmod -R 777 /var/www/konnec_nas/storage

composer config --working-dir=/var/www/konnec_nas --no-interaction http-basic.nova.laravel.com christian.daquino@gmail.com qHjBb3JN9ZWFo8G0w4qEyt94cHQhOaBMgUvl33aLk2wd1yrFgK
composer install --working-dir=/var/www/konnec_nas --optimize-autoloader --no-interaction
# mariadb -u root -p   /var/www/konnec_nas/database-setup.sql
php /var/www/konnec_nas/artisan key:generate
php /var/www/konnec_nas/artisan migrate --force
php /var/www/konnec_nas/artisan config:cache
php /var/www/konnec_nas/artisan route:cache
php /var/www/konnec_nas/artisan view:cache
php /var/www/konnec_nas/artisan event:cache

echo -e "${GREEN}Setting Apache Server${NC}"
cp ~/konnec_nas/setup/apache/konnec-api.conf /etc/apache2/sites-available
cp ~/konnec_nas/setup/apache/konnec.conf /etc/apache2/sites-available
a2ensite konnec-api.conf
a2ensite konnec.conf
systemctl reload apache2

#Supervisor
echo -e "${GREEN}Configuring Supervisor${NC}"
cp /var/www/konnec_nas/setup/workers/horizon-worker.conf /etc/supervisor/conf.d
# cp /var/www/konnec_nas/setup/workers/octane-worker.conf /etc/supervisor/conf.d

supervisorctl reread
supervisorctl update
supervisorctl start all

# CRON Job
echo -e "${GREEN}Setup CRON jobs${NC}"
echo "* * * * * php /var/www/konnec_nas/artisan schedule:run > '/dev/null' 2>&1" >> /etc/crontab

