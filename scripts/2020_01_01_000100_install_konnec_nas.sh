#!/bin/bash

#Laravel
#cd tfmch_LARAVEL
echo "Installing Konnec NAS"
mkdir /var/www/konnec_nas/storage/framework/sessions /var/www/konnec_nas/storage/framework/views /var/www/konnec_nas/storage/framework/cache
sudo chmod -R 777 /var/www/konnec_nas/storage
/var/www/konnec_nas/composer install --optimize-autoloader --no-dev
# ln -s /home/$USER/konnec_nas/public/storage /home/$USER/konnec_nas/storage/app/electron/Packaged
mariadb -u root -p   /var/www/konnec_nas/database-setup.sql
/var/www/konnec_nas/php artisan migrate
/var/www/konnec_nas/php artisan config:cache
/var/www/konnec_nas/php artisan route:cache
/var/www/konnec_nas/php artisan view:cache
/var/www/konnec_nas/php artisan event:cache

#Supervisor
echo "Configuring Supervisor"
sudo cp /var/www/konnec_nas/laravel-worker.conf /etc/supervisor/conf.d
# sudo cp /var/www/konnec_nas/echo-server-worker.conf /etc/supervisor/conf.d
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start laravel-worker:*
# sudo supervisorctl start echo-server-worker:*