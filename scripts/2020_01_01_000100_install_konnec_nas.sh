#!/bin/bash

# Create Database
echo "Creating Database"
mysql -u root -e "create database konnec_nas; \
grant all privileges on konnec_nas.* to admin@localhost identified by 'konnec'; \
flush privileges;"

# Install Laravel
echo "Installing Konnec NAS"
cp -r ~/konnec_nas /var/www/
# mkdir /var/www/konnec_nas/storage/framework/sessions /var/www/konnec_nas/storage/framework/views /var/www/konnec_nas/storage/framework/cache
cp /var/www/konnec_nas/.env.example /var/www/konnec_nas/.env
chmod -R 777 /var/www/konnec_nas/storage
composer install --optimize-autoloader --working-dir=/var/www/konnec_nas -Y
# ln -s /home/$USER/konnec_nas/public/storage /home/$USER/konnec_nas/storage/app/electron/Packaged
# mariadb -u root -p   /var/www/konnec_nas/database-setup.sql
php /var/www/konnec_nas/artisan key:generate
php /var/www/konnec_nas/artisan migrate --force
php /var/www/konnec_nas/artisan config:cache
php /var/www/konnec_nas/artisan route:cache
php /var/www/konnec_nas/artisan view:cache
php /var/www/konnec_nas/artisan event:cache

echo "Setting Apache Server"
cp ~/konnec_nas/setup/apache/konnec-api.conf /etc/apache2/sites-available
cp ~/konnec_nas/setup/apache/konnec.conf /etc/apache2/sites-available
a2ensite konnec-api.conf
a2ensite konnec.conf
systemctl reload apache2

#Supervisor
echo "Configuring Supervisor"
cp /var/www/konnec_nas/setup/workers/horizon-worker.conf /etc/supervisor/conf.d
# cp /var/www/konnec_nas/setup/workers/octane-worker.conf /etc/supervisor/conf.d

supervisorctl reread
supervisorctl update
supervisorctl start all
