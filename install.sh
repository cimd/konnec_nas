#!/bin/bash
find ./konnec_nas/scripts/ -name "*.sh" -exec chmod +x {} \;

./scripts/2020_01_01_000000_init_setup.sh
./scripts/2020_01_01_000001_install_apache.sh
./scripts/2020_01_01_000002_install_mariadb.sh
./scripts/2020_01_01_000003_install_php_8-1.sh
./scripts/2020_01_01_000005_install_composer.sh
./scripts/2020_01_01_000007_install_redis.sh
./scripts/2020_01_01_000013_install_supervisor.sh
./scripts/2020_01_01_000001_install_konnec_nas.sh