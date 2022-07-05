#!/bin/bash
echo "Installing Nodev14"
# curl -sL https://deb.nodesource.com/setup_14.x | bash -
# cat /etc/apt/sources.list.d/nodesource.list
# deb https://deb.nodesource.com/node_14.x focal main
# deb-src https://deb.nodesource.com/node_14.x focal main
# apt -y install nodejs

# echo "Installing Yarn"
# curl -sL https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add -
# echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list
# apt update && apt install yarn

snap install node --channel=14/stable --classic -y