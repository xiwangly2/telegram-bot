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
if($debug == '1'){
	echo(getHttps($url,1).'<hr/>');
}
else{
	getHttps($url,0);
}
//sethook
if(!empty($certificate)){
	$pa1 = "&certificate={$certificate}";
}
if(!empty($ip_address)){
	$pa2 = "&ip_address={$ip_address}";
}
if($max_connections >= 1 && $max_connections <= 100){
	$pa3 = "&max_connections={$max_connections}";
}
if(!empty($allowed_updates)){
	$pa4 = "&allowed_updates={$allowed_updates}";
}
if(is_bool($drop_pending_updates)){
	$pa5 = "&drop_pending_updates={$drop_pending_updates}";
}
$hookurl = urlencode($hookurl);
$url = "{$connectroot}setWebhook?url={$hookurl}{$pa1}{$pa2}{$pa3}{$pa4}{$pa5}";
@file_put_contents('webhook.lck','true');
echo(getHttps($url,1));
if($debug == '1'){
	echo('<hr/>The full address is \''.$url.'\'.');
}
?>