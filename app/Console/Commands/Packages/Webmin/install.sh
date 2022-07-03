curl -fsSL https://download.webmin.com/jcameron-key.asc | sudo gpg --dearmor -o /usr/share/keyrings/webmin.gpg

echo "deb [signed-by=/usr/share/keyrings/webmin.gpg] http://download.webmin.com/download/repository sarge contrib" \
>> /etc/apt/sources.list

# deb http://download.webmin.com/download/repository sarge contrib

# wget -q -O- http://www.webmin.com/jcameron-key.asc | sudo apt-key add
sudo apt update
sudo apt install webmin
sudo ufw allow 10000
