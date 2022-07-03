#!/bin/bash
echo -e "${GREEN}Cleanning Up${NC}"
rm -r konnec_nas

echo -e "${GREEN}Installation COMPLETE${NC}"
ipAddress=`hostname -I`
echo "Run Konnec NAS at:"
echo "http://$ipAddress/public/nas"