<?php
include_once './config.php';
include_once './function.php';
if(@file_get_contents('./webhook.lck') =='true')
{
	$url = "https://api.telegram.org/bot{$token}/getWebhookInfo";
	getHttpsOutput($url);
	die('<br/>To change this setting, change or delete the "webhook.lck" file to unlock the settings.');
}
//deletehook
$url = "https://api.telegram.org/bot{$token}/deleteWebhook";
getHttps($url);
//sethook
$url = "https://api.telegram.org/bot{$token}/setWebhook?url={$hookurl}";
getHttpsOutput($url);
@file_put_contents('./webhook.lck','true');
?>