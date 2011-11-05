<?php
include_once(dirname(__FILE__).'/config.php');

$current_user = User::get();
?><html>
<head><title>Sample Twitter Client</title></head>
<body>
<div style="float: right"><?php include_once(dirname(__FILE__).'/users/navbox.php'); ?></div>

<h1><a href="<?php echo UserConfig::$SITEROOTURL ?>">Sample Twitter Client</a></h1>

