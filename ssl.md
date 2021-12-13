sudo apt install python3-certbot-apache -y
sudo ufw allow 'Apache Full'
sudo certbot --apache -d photo.cclife.hk -d www.photo.cclife.hk
sudo systemctl status certbot.timer
sudo certbot renew --dry-run

sudo snap install core; sudo snap refresh core
sudo snap install --classic certbot
sudo ln -s /snap/bin/certbot /user/bin/certbot
sudo certbot --apache