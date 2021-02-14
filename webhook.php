<?php
include_once 'config.php';
include_once 'function.php';
if(@file_get_contents('webhook.lck') =='true'){
	if($debug == '1'){
		$url = "{$connectroot}getWebhookInfo";
		echo(getHttps($url,1).'<hr/>');
	}
	die('To change this setting, change or delete the "webhook.lck" file to unlock the settings.');
}
//deletehook
$url = "{$connectroot}deleteWebhook";
getHttps($url,0);
//sethook
$url = "{$connectroot}setWebhook?url={$hookurl}";
echo(getHttps($url,1));
@file_put_contents('webhook.lck','true');
?>