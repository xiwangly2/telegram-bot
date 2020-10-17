<?php
include_once './config.php';
include_once './function.php';
if(@file_get_contents('./webhook.lck') =='true')
{
	$url = "https://api.telegram.org/bot{$token}/getWebhookInfo";
	getHttps($url,1);
	die('<br/>To change this setting, change or delete the "webhook.lck" file to unlock the settings.');
}
//deletehook
$url = "https://api.telegram.org/bot{$token}/deleteWebhook";
getHttps($url);
//sethook
$url = "https://api.telegram.org/bot{$token}/setWebhook?url={$hookurl}";
getHttps($url,1);
@file_put_contents('./webhook.lck','true');
?>