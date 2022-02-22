<?php
namespace App\Config;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//# config base de données
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'alltricks');
//# config RSS
define('RSS_URL', 'http://www.lemonde.fr/rss/une.xml');
