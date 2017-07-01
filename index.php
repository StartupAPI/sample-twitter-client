<?php
include_once(dirname(__FILE__).'/users/users.php');

$user = StartupAPI::requireLogin();

// start with global template data needed for Startup API menus and stuff
$template_info = StartupAPI::getTemplateInfo();

if ($user) {
	$template_info['name'] = $user->getName();

	$twitter_credentials = $user->getUserCredentials('twitter');

	try {
		$result = $twitter_credentials->makeOAuthRequest(
			'https://api.twitter.com/1.1/statuses/home_timeline.json', 'GET'
		);

		$statuses = json_decode($result["body"], true);

		foreach ($statuses as $status) {
			$template_info['statuses'][] = [
				"profile_image_url" => $status["user"]["profile_image_url"],
				"text" => $status["text"],
				"source" => $status["source"]
			];
		}
	} catch (OAuthException2 $ex) {
		$template_info['twitter_error'] = $ex->getMessage();
	}
}

StartupAPI::$template->getLoader()->addPath(__DIR__ . '/templates', 'app');
StartupAPI::$template->display('@app/index.html.twig', $template_info);
