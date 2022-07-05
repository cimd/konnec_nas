#!/bin/bash
echo "Installing Nodev14"
# curl -sL https://deb.nodesource.com/setup_14.x | sudo bash -
# cat /etc/apt/sources.list.d/nodesource.list
# deb https://deb.nodesource.com/node_14.x focal main
# deb-src https://deb.nodesource.com/node_14.x focal main
# sudo apt -y install nodejs

# echo "Installing Yarn"
# curl -sL https://dl.yarnpkg.com/debian/pubkey.gpg | sudo apt-key add -
# echo "deb https://dl.yarnpkg.com/debian/ stable main" | sudo tee /etc/apt/sources.list.d/yarn.list
# sudo apt update && sudo apt install yarn

sudo snap install node --channel=14/stable --classic -y