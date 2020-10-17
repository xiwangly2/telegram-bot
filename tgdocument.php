<?php
if(!isset($msg) || $msg == '')
{
	die;
}
elseif($msg == "/lolifile" || $msg == "/lolifile{$username}")
{
	$dir = '../images/';
	$list = @scandir($dir,0);
	$rand = @rand(2,@count($list)-'1');
	$file = $dir.$list[$rand];
	$text = "https://xiwangly.top/images/{$file}";
}
$text = @rawurlencode($text);
$url = "https://api.telegram.org/bot{$token}/senddocument?chat_id={$chat_id}&document={$text}";
getHttps($url);
?>