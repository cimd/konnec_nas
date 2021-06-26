#!/bin/bash

#Laravel
#cd tfmch_LARAVEL
echo "Setting Apache Server"
sudo cp ./konnec_nas/setup/konnec_nas.config /etc/apache2/available-sites/
sudo a2enconf /etc/apache2/available-sites/konnec_nas.config
# sudo a2enconf php-fpm
sudo systemctl restart apache2
