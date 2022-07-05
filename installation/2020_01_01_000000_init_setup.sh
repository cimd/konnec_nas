#!/bin/bash

GREEN='\033[0;32m'
NC='\033[0m' # No Color

#Ubuntu Deployment
echo -e "${GREEN}Updating Ubuntu${NC}"
sudo apt install curl ca-certificates apt-transport-https software-properties-common \
gnupg lsb-release unzip samba smbclient -y