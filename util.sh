#!/usr/bin/env bash

#install xdebug ref. http://www.dieuwe.com/blog/xdebug-ubuntu-1604-php7
sudo apt-get install php-xdebug && sudo service apache2 restart
php -m | grep xdebug #aftermath check
