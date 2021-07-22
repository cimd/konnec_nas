
# wget https://download.nextcloud.com/server/releases/nextcloud-21.0.1.zip
# sudo unzip nextcloud-21.0.1.zip -d /var/www/
sudo snap install nextcloud
# sudo nextcloud.manual-install admin admin
# sudo nextcloud.occ config:system:set trusted_domains 1 --value=nextcloud.daquino.nas



# sudo chown www-data:www-data /var/www/nextcloud/ -R

# Create Database
# sudo mysql -u root -e "create database nextcloud; \
# grant all privileges on nextcloud.* to admin@localhost identified by 'admin'; \
# flush privileges;"



# sudo cp ~/konnec_nas/setup/nextcloud.config /etc/apache2/available-sites/
# sudo nano /etc/apache2/sites-available/nextcloud.conf


# sudo a2ensite nextcloud.conf
# sudo apache2ctl -t
# sudo systemctl restart apache2
# sudo apt install -y imagemagick php-imagick libapache2-mod-php7.4 php7.4-common php7.4-mysql php7.4-fpm php7.4-gd php7.4-json php7.4-curl php7.4-zip php7.4-xml php7.4-mbstring php7.4-bz2 php7.4-intl php7.4-bcmath php7.4-gmp
# sudo systemctl reload apache2