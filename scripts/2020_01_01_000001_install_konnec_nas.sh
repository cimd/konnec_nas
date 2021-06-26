#!/bin/bash

#Laravel
#cd tfmch_LARAVEL
echo "Installing Konnec NAS"
mkdir storage/framework/sessions storage/framework/views storage/framework/cache
sudo chmod -R 777 storage
composer install --optimize-autoloader --no-dev
ln -s /home/$USER/konnec_nas/public/storage /home/$USER/konnec_nas/storage/app/electron/Packaged
mariadb -u root -p   database-setup.sql
php artisan migrate
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

#Supervisor
echo "Installing Supervisor"
sudo apt-get -y install supervisor
#sudo service supervisor restart
sudo cp /home/$USER/konnec_nas/laravel-worker.conf /etc/supervisor/conf.d
sudo cp /home/$USER/konnec_nas/echo-server-worker.conf /etc/supervisor/conf.d
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start laravel-worker:*
# sudo supervisorctl start echo-server-worker:*