sudo git clone https://github.com/linuxserver/Heimdall.git /var/www/heimdall
sudo cp /var/www/heimdall/.env.example /var/www/heimdall/.env
sudo composer /var/www/heimdall/install
sudo php /var/www/heimdall/artisan key:generate