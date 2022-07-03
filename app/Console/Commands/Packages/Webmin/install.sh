#!/bin/bash

curl -fsSL https://download.webmin.com/jcameron-key.asc | sudo gpg --dearmor -o /usr/share/keyrings/webmin.gpg

echo "deb [signed-by=/usr/share/keyrings/webmin.gpg] http://download.webmin.com/download/repository sarge contrib" \
>> /etc/apt/sources.list

sudo apt update
sudo apt install webmin -y
sudo ufw allow 10000
