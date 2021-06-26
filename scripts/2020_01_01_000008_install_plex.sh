#!/bin/bash

echo "Installing Plex Media Server"
wget https://downloads.plex.tv/plex-media-server-new/1.19.3.2852-219a9974e/
debian/plexmediaserver_1.19.3.2852-219a9974e_amd64.deb
sudo dpkg –i plexmediaserver_1.19.3..2852-219a9974e_amd64.deb
sudo systemctl enable plexmediaserver.service
sudo systemctl start plexmediaserver.service
# sudo systemctl status plexmediaserver.service