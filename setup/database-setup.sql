CREATE DATABASE tfmch;
CREATE USER 'admin'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON tfmch.* TO 'admin'@'localhost';
FLUSH PRIVILEGES;