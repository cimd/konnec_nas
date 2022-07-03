#!/bin/bash
find ./konnec_nas/scripts/ -name "*.sh" -exec chmod +x {} \;

./konnec_nas/scripts/2020_01_01_000000_init_setup.sh
./konnec_nas/scripts/2020_01_01_000001_install_apache.sh
./konnec_nas/scripts/2020_01_01_000002_install_mariadb.sh
./konnec_nas/scripts/2020_01_01_000003_install_php_8-1.sh
./konnec_nas/scripts/2020_01_01_000005_install_composer.sh
./konnec_nas/scripts/2020_01_01_000007_install_redis.sh
./konnec_nas/scripts/2020_01_01_000013_install_supervisor.sh
./konnec_nas/scripts/2020_01_01_000100_install_konnec_nas.sh
./konnec_nas/scripts/2020_01_01_000200_done.sh