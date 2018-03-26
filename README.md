# Eureka Tracker
A tool to help users collaborate and track Notorious Monsters in Eureka, in Final Fantasy XIV: Stormblood.

## Prerequisites
* [PHP 7](http://php.net/downloads.php)
* [MySQL 5.5](https://dev.mysql.com/downloads/installer/)

## Setting Up the Database
* Run `/core/database.sql` on your MySQL database

### Configuring the PHP Application
* Update $dsn, $username, and $password on lines 12 to 14 of `/core/functions.php` to match your MySQL database
* Modify domain name within `function redirect` on line 178 of `/core/functions.php` to match your domain name setting
* Update domain name in `/assets/js/export.js` to match your domain name settings.
