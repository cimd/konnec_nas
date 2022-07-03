#!/bin/bash

#Ubuntu Deployment
echo "Ubuntu Updates"
sudo apt-get update
sudo apt-get -y upgrade
sudo apt install curl ca-certificates apt-transport-https software-properties-common \
gnupg lsb-release unzip smbclient \
-y
sudo add-apt-repository ppa:ondrej/php -y
sudo apt-get update
