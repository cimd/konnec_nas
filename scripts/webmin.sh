sudo nano /etc/apt/sources.list

deb http://download.webmin.com/download/repository sarge contrib

wget -q -O- http://www.webmin.com/jcameron-key.asc | sudo apt-key add
sudo apt update
sudo apt install webmin
sudo ufw allow 10000
