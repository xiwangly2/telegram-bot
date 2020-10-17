<?php
if(!isset($msg) || $msg == '')
{
	die;
}
elseif($msg == "菜单" || $msg == "/菜单" || $msg == "/help" || $msg == "/help{$username}")
{
	$text = file_get_contents('./menu.txt');
}
elseif($msg == "/")
{
	$text = "命令";
}
elseif($msg == "/start" || $msg == "/start{$username}")
{
	$text = "输入菜单试试？";
}
elseif(preg_match('/复读/i',"{$msg}"))
{
	$text = substr($msg,6);
}
elseif($msg == "/ping" || $msg == "/ping{$username}")
{
	$text = "/ping <ip>";
}
elseif(preg_match('/ping/i',"{$msg}"))
{
	$ip = substr($msg,5);
	include_once './ping.php';
	$text = $sc;
}
elseif($msg == "/uuid" || $msg == "/uuid{$username}")
{
	$text = uuid();
}
$text = @rawurlencode($text);
$url = "https://api.telegram.org/bot{$token}/sendmessage?chat_id={$chat_id}&text={$text}";
getHttps($url);
?>