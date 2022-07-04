#!/bin/bash
GREEN='\033[0;32m'
NC='\033[0m' # No Color

#Supervisor
echo -e "${GREEN}Installing Supervisor${NC}"
sudo apt -y install supervisor