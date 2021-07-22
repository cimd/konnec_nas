#!/bin/bash


deb [arch=amd64] https://download.virtualbox.org/virtualbox/debian hirsute contrib
wget -q https://www.virtualbox.org/download/oracle_vbox_2016.asc -O- | sudo apt-key add -
wget -q https://www.virtualbox.org/download/oracle_vbox.asc -O- | sudo apt-key add -
sudo apt-get update
sudo apt-get install virtualbox-6.1

# sudo apt-get install -y virtualbox
# sudo apt-get install -y virtualbox—ext–pack