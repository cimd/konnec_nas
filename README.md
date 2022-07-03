# konnec_nas
 
sudo apt update
sudo apt upgrade -Y
sudo apt install git -Y
git clone https://github.com/cimd/konnec_nas.git
chmod +x ./konnec_nas/install.sh
./konnec_nas/install.sh

chmod +x scripts/*.sh
<!-- sudo cp -r konnec_nas /var/www/ -->
<!-- chmod u+x ./konnec_nas/install.sh -->

find ./konnec_nas/scripts/ -name "*.sh" -exec chmod +x {} \;

sudo ./konnec_nas/install.sh



php artisan db:seed --class=UserSeeder


Snap
Plex
Adguard
Mosquitto
NodeRed

Docker
Heimdall
HomeAssistant
Portainer

APT
Transmission
CouchPotato
Syncthing
Duplicati
NextCloud
CodeServer
Webmin
Grafana
Piwigo
phpMyAdmin
ExpressVPN


FileBrowser
