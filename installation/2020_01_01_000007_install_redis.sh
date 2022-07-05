#!/bin/bash
GREEN='\033[0;32m'
NC='\033[0m' # No Color

#Redis
echo -e "${GREEN}Installing Redis${NC}"
sudo apt install redis-server -y