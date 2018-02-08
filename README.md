# MVC-Framework
Simple MVC framework with object PHP

Getting Started
Copy the project in your folder and install the database dump in your PhpMyAdmin. Follow the instructions to complete the installation.

Prerequisites
Apache Server
PHP 5.6+
Mysql Database
Install XAMPP for an easy quickstart

Config File
Modify the app/config/config.php file according to your needs. You can use example.config.php file inside the same folder as an example based on my local settings.

//Database Configuration
    define('DB_HOST', 'localhost');
    define('DB_USER', '_YOUR_USER');
    define('DB_PASS', '_YOUR_PASS_');
    define('DB_NAME', '_YOUR_DBNAME');
    define('APPROOT' , dirname(dirname(__FILE__)));
    define('URLROOT', '_YOUR_URL_');
    define('SITENAME', 'MVC Framework');
    
Modify it like this

//Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'shareposts');

htaccess file
Modify the .htaccess file inside the public folder to match the name of your installation folder
 
 RewriteBase /mvcframework/public

Install the Database
Create a database of your choice in PhpMyAdmin.

Built With
PHP
Bootstrap CSS 4.0
Authors
Resim Boyadzhiev
