#!/usr/bin/env bash

# Update the box
# --------------
# Downloads the package lists from the repositories
# and "updates" them to get information on the newest
# versions of packages and their dependencies
apt-get update

# Install Vim
apt-get install -y vim

# Apache
# ------
# Install
apt-get install -y apache2
# Remove /var/www default
rm -rf /var/www
# Symlink /vagrant to /var/www
ln -fs /vagrant /var/www
# Add ServerName to httpd.conf
echo "ServerName localhost" > /etc/apache2/httpd.conf
# Setup hosts file
VHOST=$(cat <<EOF
<VirtualHost *:80>
  DocumentRoot "/vagrant/public"
  ServerName localhost
  <Directory "/vagrant/public">
    AllowOverride All
    Require all granted
  </Directory>
</VirtualHost>
EOF
)
echo "${VHOST}" > /etc/apache2/sites-enabled/000-default.conf
# Enable mod_rewrite
a2enmod rewrite
# Restart apache
service apache2 restart

# PHP 5.4
# -------
apt-get install -y libapache2-mod-php5
# Add add-apt-repository binary
apt-get install -y python-software-properties
# Update
apt-get update

# PHP stuff
# ---------
# Command-Line Interpreter
apt-get install -y php5-cli
# MySQL database connections directly from PHP
apt-get install -y php5-sqlite
# cURL is a library for getting files from FTP, GOPHER, HTTP server
apt-get install -y php5-curl
# Module for MCrypt functions in PHP
apt-get install -y php5-mcrypt

# cURL
# ----
apt-get install -y curl

# Git
# ---
apt-get install -y git-core

# Install Composer
# ----------------
curl -s https://getcomposer.org/installer | php
# Make Composer available globally
mv composer.phar /usr/local/bin/composer

# Laravel stuff
# -------------
# Load Composer packages
cd /var/www
composer install --dev

# Set up the database
# php artisan migrate