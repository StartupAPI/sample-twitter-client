<?php
include_once(dirname(__FILE__).'/config.php');

$current_user = User::get();
?><html>
<head>
	<title>Sample Twitter Client</title>
	<?php StartupAPI::head() ?>
</head>
<body>
<div style="float: right"><?php StartupAPI::power_strip() ?></div>

<h1><a href="<?php echo UserConfig::$SITEROOTURL ?>">Sample Twitter Client</a></h1>

