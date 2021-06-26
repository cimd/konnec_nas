#!/bin/bash

#Ubuntu Deployment
echo "Ubuntu Updates"
sudo apt-get update
sudo apt-get -y upgrade
sudo apt install curl ca-certificates apt-transport-https software-properties-common gnupg lsb-release unzip -y
sudo apt-get update
