#!/bin/bash

GREEN='\033[0;32m'
NC='\033[0m' # No Color

echo -e "${GREEN}Updating environment${NC}"
sudo apt update & upgrade -y
sudo apt install git -y


echo -e "${GREEN}Downloading Repository${NC}"
git clone https://github.com/cimd/konnec_nas_LARAVEL.git konnec_nas



./konnec_nas/scripts/2020_01_01_000000_init_setup.sh
./konnec_nas/scripts/2020_01_01_000001_additional_ppas.sh
./konnec_nas/scripts/2020_01_01_000001_install_apache.sh
./konnec_nas/scripts/2020_01_01_000002_install_mariadb.sh
./konnec_nas/scripts/2020_01_01_000003_install_php_8-1.sh
./konnec_nas/scripts/2020_01_01_000005_install_composer.sh
./konnec_nas/scripts/2020_01_01_000007_install_redis.sh
./konnec_nas/scripts/2020_01_01_000013_install_supervisor.sh
./konnec_nas/scripts/2020_01_01_000100_install_konnec_nas.sh
./konnec_nas/scripts/2020_01_01_000110_exiftool.sh
./konnec_nas/scripts/2020_01_01_000111_ffmpeg.sh
./konnec_nas/scripts/2020_01_01_000120_cockpit.sh
./konnec_nas/scripts/2020_01_01_000121_webmin.sh
./konnec_nas/scripts/2020_01_01_000200_done.sh