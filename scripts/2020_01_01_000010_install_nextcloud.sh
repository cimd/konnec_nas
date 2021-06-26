
wget https://download.nextcloud.com/server/releases/nextcloud-21.0.1.zip
sudo unzip nextcloud-21.0.1.zip -d /var/www/
sudo chown www-data:www-data /var/www/nextcloud/ -R
sudo mysql
create database nextcloud;
create user nextclouduser@localhost identified by 'your-password';
grant all privileges on nextcloud.* to nextclouduser@localhost identified by 'your-password';
flush privileges;
exit;
sudo nano /etc/apache2/sites-available/nextcloud.conf


<VirtualHost *:80>
        DocumentRoot "/var/www/nextcloud"
        ServerName nextcloud.example.com

        ErrorLog ${APACHE_LOG_DIR}/nextcloud.error
        CustomLog ${APACHE_LOG_DIR}/nextcloud.access combined

        <Directory /var/www/nextcloud/>
            Require all granted
            Options FollowSymlinks MultiViews
            AllowOverride All

           <IfModule mod_dav.c>
               Dav off
           </IfModule>

        SetEnv HOME /var/www/nextcloud
        SetEnv HTTP_HOME /var/www/nextcloud
        Satisfy Any

       </Directory>

</VirtualHost>



sudo a2ensite nextcloud.conf
sudo a2enmod rewrite headers env dir mime setenvif ssl
sudo apache2ctl -t
sudo systemctl restart apache2
sudo apt install imagemagick php-imagick libapache2-mod-php7.4 php7.4-common php7.4-mysql php7.4-fpm php7.4-gd php7.4-json php7.4-curl php7.4-zip php7.4-xml php7.4-mbstring php7.4-bz2 php7.4-intl php7.4-bcmath php7.4-gmp
sudo systemctl reload apache2