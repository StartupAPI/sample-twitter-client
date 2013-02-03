<?php
/* including local app config */
require_once(dirname(__FILE__).'/config.php');

/**
 * You must fill it in with some random string
 * this protects some of your user's data when sent over the network
 * and must be different from other sites
 */
UserConfig::$SESSION_SECRET = $randomness;

/**
 * Database connectivity 
 */
UserConfig::$mysql_db = $mysql_db;
UserConfig::$mysql_user = $mysql_user;
UserConfig::$mysql_password = $mysql_password;
#UserConfig::$mysql_host = 'localhost';
#UserConfig::$mysql_port = '...port...';
UserConfig::$mysql_socket = $mysql_socket;

/**
 * Twitter Authentication configuration
 * Register your app here: https://dev.twitter.com/apps/new
 * And then uncomment two lines below and copy API Key and App Secret
 */
UserConfig::loadModule('twitter');
new TwitterAuthenticationModule($twitter_OAuth_consumer_key, $twitter_OAuth_consumer_secret);

/**
 * User IDs of admins for this instance (to be able to access dashboard at /users/admin/)
 */
#UserConfig::$admins[] = 1; // usually first user has ID of 1

/**
 * Set these to point at your header and footer or leave them commented out to use default ones
 */
UserConfig::$header = dirname(__FILE__).'/header.php';
UserConfig::$footer = dirname(__FILE__).'/footer.php';

UserConfig::$useAccounts = false;
