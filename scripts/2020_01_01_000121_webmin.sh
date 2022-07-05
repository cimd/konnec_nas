#!/bin/bash
GREEN='\033[0;32m'
NC='\033[0m' # No Color

echo -e "${GREEN}Installing Webmin${NC}"
sudo apt install webmin -y
sudo ufw allow 10000
