#!/bin/bash

#Redis
echo "Installing Redis"
sudo apt install redis-server -y
sudo systemctl restart redis.service
sudo systemctl status redis