sudo add-apt-repository ppa:transmissionbt/ppa
sudo apt-get update
sudo apt-get install transmission-cli transmission-common transmission-daemon
sudo nano /var/lib/transmission-daemon/info/settings.json

# sudo service transmission-daemon stop
# https://help.ubuntu.com/community/TransmissionHowTo