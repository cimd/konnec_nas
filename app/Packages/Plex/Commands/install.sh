#!/bin/bash

curl https://downloads.plex.tv/plex-keys/PlexSign.key | apt-key add -
echo deb https://downloads.plex.tv/repo/deb public main | tee /etc/apt/sources.list.d/plexmediaserver.list
apt update -y
yes | apt install plexmediaserver -y
ufw allow 32400