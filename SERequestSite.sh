#!/bin/bash
# Script Author : _Dreyannz
MYIP=$(wget -qO- ipv4.icanhazip.com)
clear
echo -e "                                                        "
echo -e "\e[94m    :::::::::  :::::::::   ::::::::  :::   :::    "
echo -e "\e[94m    :+:    :+: :+:    :+: :+:    :+: :+:   :+:    "
echo -e "\e[94m    +:+    +:+ +:+    +:+        +:+  +:+ +:+     "
echo -e "\e[94m    +#+    +:+ +#++:++#:      +#++:    +#++:      "
echo -e "\e[94m    +#+    +#+ +#+    +#+        +#+    +#+       "
echo -e "\e[94m    #+#    #+# #+#    #+# #+#    #+#    #+#       "
echo -e "\e[94m    #########  ###    ###  ########     ###       "
echo -e "\e[94m            SERequestSite by _Dreyannz_           "
echo -e "\e[94m                                                  "
read -p "    Server IP             : " -e -i $MYIP CHANGE_ME_IP
echo -e "                                                   "
read -p "    Virtual Hub Name      : "  CHANGE_ME_VHUB
echo -e "                                                  "
read -p "    SE Server Password    : "  CHANGE_ME_PASSWORD
echo -e "                                                  "
read -p "    Account Validity      : " -e -i 5 CHANGE_ME_DAYS
echo -e "\e[0m                                                   "
sleep 2
read -p       "      Are You Sure With The Details[y/n]? : " answer
case ${answer:0:1} in
y|Y )
clear
CHANGE_ME_IP_X="s/CHANGE_ME_IP/$CHANGE_ME_IP/g";
CHANGE_ME_VHUB_X="s/CHANGE_ME_VHUB/$CHANGE_ME_VHUB/g";
CHANGE_ME_PASSWORD_X="s/CHANGE_ME_PASSWORD/$CHANGE_ME_PASSWORD/g";
CHANGE_ME_DAYS_X="s/CHANGE_ME_DAYS/$CHANGE_ME_DAYS/g";
#Installing Pre-Requisites
apt-get update -y
apt-get upgrade -y
apt-get -y install nginx php5 php5-fpm php5-cli php5-mysql php5-mcrypt
rm /etc/nginx/sites-enabled/default
rm /etc/nginx/sites-available/default
mv /etc/nginx/nginx.conf /etc/nginx/nginx.conf.backup 
mv /etc/nginx/conf.d/vps.conf /etc/nginx/conf.d/vps.conf.backup 
wget -O /etc/nginx/nginx.conf "https://raw.githubusercontent.com/Dreyannz/SERequestSite/master/nginx.conf" 
wget -O /etc/nginx/conf.d/vps.conf "https://raw.githubusercontent.com/Dreyannz/SERequestSite/master/vps.conf" 
sed -i 's/cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/g' /etc/php5/fpm/php.ini 
sed -i 's/listen = \/var\/run\/php5-fpm.sock/listen = 127.0.0.1:9000/g' /etc/php5/fpm/pool.d/www.conf
useradd -m vps
mkdir -p /home/vps/public_html
rm /home/vps/public_html/index.html
echo "<?php phpinfo() ?>" > /home/vps/public_html/info.php
chown -R www-data:www-data /home/vps/public_html
chmod -R g+rw /home/vps/public_html service php5-fpm restart
service php5-fpm restart
service nginx restart
#Unpacking Website
cd /home/vps/public_html/
wget https://github.com/Dreyannz/SERequestSite/raw/master/SERequestSite.tar.gz
tar -xzf SERequestSite.tar.gz
rm SERequestSite.tar.gz
sed -i $CHANGE_ME_IP_X request.php;
sed -i $CHANGE_ME_VHUB_X request.php;
sed -i $CHANGE_ME_PASSWORD_X request.php;
sed -i $CHANGE_ME_DAYS_X request.php;
#Setting Up Cron Job
cd
echo '#!/bin/bash
# Script Author : _Dreyannz
cd /home/vps/public_html/
mv account_request.sh /root
rm my_account_* -f
cd
chmod +x account_request.sh
./account_request.sh
rm account_request.sh -f' > SEAutomata.sh
chmod +x SEAutomata.sh
crontab -l > mycron
echo "*/2 * * * * ./SEAutomata.sh" >> mycron
crontab mycron
rm mycron -f
sudo service cron restart
#Output
clear
echo -e "                                                        "
echo -e "\e[94m    :::::::::  :::::::::   ::::::::  :::   :::    "
echo -e "\e[94m    :+:    :+: :+:    :+: :+:    :+: :+:   :+:    "
echo -e "\e[94m    +:+    +:+ +:+    +:+        +:+  +:+ +:+     "
echo -e "\e[94m    +#+    +:+ +#++:++#:      +#++:    +#++:      "
echo -e "\e[94m    +#+    +#+ +#+    +#+        +#+    +#+       "
echo -e "\e[94m    #+#    #+# #+#    #+# #+#    #+#    #+#       "
echo -e "\e[94m    #########  ###    ###  ########     ###       "
echo -e "\e[94m            SERequestSite by _Dreyannz_           "
echo -e "\e[94m                                                  "
echo -e "\e[94m     Your SoftEther Request Site Is Now Ready     "
echo -e "\e[94m                                                  "
echo -e "\e[94m        Account Requests Will Be Processed        "
echo -e "\e[94m                  Every 2 Minutes                 "
echo -e "\e[0m                                                  "
rm SERequestSite.sh -f
;;
* )
clear
./SERequestSite.sh
;;
esac
