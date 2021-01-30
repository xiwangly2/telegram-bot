<?php
include_once './config.php';
include_once './function.php';
if(@file_get_contents('./webhook.lck') =='true'){
	$url = "{$connectroot}getWebhookInfo";
	getHttps($url,1);
	die('<hr/>To change this setting, change or delete the "webhook.lck" file to unlock the settings.');
}
//deletehook
$url = "{$connectroot}deleteWebhook";
getHttps($url);
//sethook
$url = "{$connectroot}setWebhook?url={$hookurl}";
getHttps($url,1);
@file_put_contents('./webhook.lck','true');
?>