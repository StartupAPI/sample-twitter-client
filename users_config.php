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
UserConfig::$mysql_host = isset($mysql_host) ? $mysql_host : 'localhost';
UserConfig::$mysql_port = isset($mysql_port) ? $mysql_port : 3306;
UserConfig::$mysql_socket = isset($mysql_port) ? $mysql_socket : null;

/**
 * Twitter Authentication configuration
 * Register your app here: https://apps.twitter.com/app/new
 * And then uncomment two lines below and copy API Key and App Secret
 */
UserConfig::loadModule('twitter');
new TwitterAuthenticationModule($twitter_OAuth_consumer_key, $twitter_OAuth_consumer_secret);

/**
 * User IDs of admins for this instance (to be able to access dashboard at /users/admin/)
 */
UserConfig::$admins = $admins; // usually first user has ID of 1

/*
 * Name of your application to be used in UI and emails to users
 */
UserConfig::$appName = 'Sample Twitter Client';

/**
 * Email configuration
 */
UserConfig::$supportEmailFromName = 'Sample App Support';
UserConfig::$supportEmailFromEmail = 'support@startupapi.com';
UserConfig::$supportEmailReplyTo = 'support@startupapi.com';

if ($amazonSMTPHost && $amazonSMTPUserName && $amazonSMTPPassword) {
  UserConfig::$mailer = Swift_Mailer::newInstance(
    Swift_SmtpTransport::newInstance($amazonSMTPHost, 587, 'tls')
      ->setUsername($amazonSMTPUserName)
      ->setPassword($amazonSMTPPassword)
  );
}

/**
 * Set these to point at your header and footer or leave them commented out to use default ones
 */
UserConfig::$header = dirname(__FILE__).'/header.php';
UserConfig::$footer = dirname(__FILE__).'/footer.php';

UserConfig::$useAccounts = false;
