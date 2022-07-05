#!/bin/bash
GREEN='\033[0;32m'
NC='\033[0m' # No Color

echo -e "${GREEN}Cleanning Up${NC}"
rm -r konnec_nas

echo -e "${GREEN}Installation COMPLETE${NC}"
ipAddress=`hostname -I`
echo "Run Konnec NAS at:"
echo -e "http://$ipAddress/public/nas"