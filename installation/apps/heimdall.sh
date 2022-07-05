git clone https://github.com/linuxserver/Heimdall.git /var/www/heimdall
cp /var/www/heimdall/.env.example /var/www/heimdall/.env
composer /var/www/heimdall/install
php /var/www/heimdall/artisan key:generate