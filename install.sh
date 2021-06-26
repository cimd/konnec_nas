#!/bin/bash
find /home/$USER/konnec_nas/scripts/ -name "*.sh" -exec chmod +x {} \;

sudo ./scripts/2020_01_01_000000_init_setup.sh
sudo ./scripts/2020_01_01_000001_install_konnec_nas.sh