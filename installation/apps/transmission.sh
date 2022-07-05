add-apt-repository ppa:transmissionbt/ppa
apt-get update
apt-get install transmission-cli transmission-common transmission-daemon
nano /var/lib/transmission-daemon/info/settings.json

# service transmission-daemon stop
# https://help.ubuntu.com/community/TransmissionHowTo