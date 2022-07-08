#!/bin/bash
GREEN='\033[0;32m'
NC='\033[0m' # No Color

echo -e "${GREEN}Installing Cockpit${NC}"
apt install cockpit cockpit-file-sharing -y
