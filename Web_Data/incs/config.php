<?php




define('DB' , 'snoottco_users' , false);
define('HOST' , 'localhost' , false);
define('USER' , 'snoottco_guys' , false);
define('PASSWORD' ,'Quicknaira.com' , false);
define('MY_DB' , DB , false);
define('MY_HOST' , HOST , false);
define('MY_USER' , USER , false);
define('MY_PASSWORD' , PASSWORD , false);
define('PARENT_COMPANY' , 'Snoott Inc.' , false);

define('PROFILE_FOLDER' , $_SERVER['DOCUMENT_ROOT']."/user_profiles/" , false);
define('PRIMARY_EMAIL' , 'kosi@snoott.com' , false);
define('PRIMARY_EMAIL_PASSWORD' , 'Quicknaira.com' , false);
define('PRIMARY_EMAIL_SERVER' , 'mail.snoott.com' , false);
define('COMPANY_NAME' , 'Snoott' , false);
define('SITE_URL' , 'https://www.snoott.com' , false);

define("MY_POST_FOLDER" , "posts_images");

define("IMAGES" , "posts_images" , true);
define("NUM_ADS", 10, false);
//mb_internal_encoding("UTF-8");


header("Cache-control:no-cache");
error_reporting(0);
/*$config->set('dbhost', 'localhost');
$config->set('dbname', 'snoottco_users'); //<-- DATABASE NAME
$config->set('dbuser', 'snoottco_guys'); //<-- USER
$config->set('dbpass', 'Quicknaira.com');
*/
?>


