#!/bin/bash


# NOT WORKING


sudo apt install mono-runtime -y
wget -O /var/www/konnec_nas/storage/temp/duplicati.deb https://github.com/duplicati/duplicati/releases/download/v2.0.6.3-2.0.6.3_beta_2021-06-17/duplicati_2.0.6.3-1_all.deb
sudo dpkg -i duplicati_2.0.6.3-1_all.deb
sudo systemctl enable duplicati

# sudo nano /etc/default/duplicati
# DAEMON_OPTS="--webservice-port=8200 --webservice-interface=any"