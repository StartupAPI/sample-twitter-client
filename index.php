<?php
include_once(dirname(__FILE__).'/users/users.php');
include_once(dirname(__FILE__).'/header.php');
?>
<style>
.status {
	border-bottom: 1px dotted silver;
}

.status img {
	float: left; margin: 0.5em;
}

.message {
	
}

.tool {
	font-size: xx-small;
	color: silver;
}
</style>
<?php

$current_user = User::get();

if (is_null($current_user)) {
	$module = StartupAPIModule::get('twitter');
	$module->renderRegistrationForm(true, null, array('returnto' => UserConfig::$SITEROOTURL));
} else {
	$creds = $current_user->getUserCredentials('twitter');

	$result = $creds->makeOAuthRequest('https://api.twitter.com/1.1/statuses/home_timeline.json', 'GET');

	$statuses= json_decode($result["body"], true);

	foreach ($statuses as $status) {
		?>
		<p class="status">
		<img src="<?php echo UserTools::escape($status["user"]["profile_image_url"]) ?>" />
		<div class="message"><?php echo UserTools::escape($status["text"]) ?></div>
		<div class="tool">Posted using <?php echo $status["source"] ?></div>
		</p>
		<div style="clear: both"/>
		<?php
	}
	
}

include_once(dirname(__FILE__).'/footer.php');
