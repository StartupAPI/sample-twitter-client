<?php
######################################################
##
##  Configuration file for sample Twitter client
##  Copy it to config.php and set values below
##
######################################################

/**
 * Source of randomness for security
 */
$randomness = '...some.random.characters.go.here...';

/**
 * MySQL configuration variables
 */
$mysql_db = 'twitter';
$mysql_user = 'twitter';
$mysql_password = '...password...';
#$mysql_socket = '/tmp/mysql.sock';

/**
 * Twitter OAuth consumer key and secret
 * Register your app here: https://apps.twitter.com/app/new
 */
$twitter_OAuth_consumer_key = '...twitter.oauth.key.goes.here...';
$twitter_OAuth_consumer_secret = '...twitter.oauth.secret.goes.here...';

/**
 * SMTP host
 */
$amazonSMTPHost = 'email-smtp.us-east-1.amazonaws.com';

/**
 * SMTP UserName
 */
$amazonSMTPUserName = '';

/**
 * SMTP Password
 */
$amazonSMTPPassword = '';
