<?php
if($msg == "/on" && $username == $administrator){
	@file_put_contents('./switch.txt','enabled');
	$text = "Bot is enabled.";
}
elseif(@file_get_contents('./switch.txt') == 'disabled'){
	die;
}
elseif($msg == "/off" && $username == $administrator){
	@file_put_contents('./switch.txt','disabled');
	$text = "Bot is disabled.";
}
elseif($msg == "菜单" || $msg == "/菜单" || $msg == "/help" || $msg == "/help{$botname}"){
	$text = @file_get_contents('./menu.txt');
}
elseif($msg == "/start" || $msg == "/start{$botname}"){
	$text = "输入 /菜单 试试？";
}
elseif(preg_match('/复读/i',"{$msg}")){
	$text = substr($msg,6);
}
elseif($msg == "/ping" || $msg == "/ping{$botname}"){
	$text = "ping <ip>";
}
elseif(preg_match('/ping/i',"{$msg}")){
	$ip = substr($msg,5);
	include_once './ping.php';
	$text = $sc;
}
elseif($msg == "/uuid" || $msg == "/uuid{$botname}"){
	$text = uuid();
}
elseif($msg == "/dwz" || $msg == "/dwz{$botname}"){
	$text = "dwz <url>";
}
elseif(preg_match('/dwz/i',"{$msg}")){
	$url = @urlencode(substr($msg,4));
	$text= getHttps("http://12n.top/dwz.php?url={$url}");
}
elseif(preg_match('/m/i',"{$msg}")){
	$msg = substr($msg,2);
	include_once './sqldic.php';
	$text = $rows['a'];
}
elseif($msg == "/yiyan" || $msg == "/yiyan{$botname}"){
	$yiyanfilename = './yiyandata.dat';
	if(!file_exists($yiyanfilename)){
		die;
	}
	$data = file_get_contents($yiyanfilename);
	$data = explode(PHP_EOL,$data);
	$text = $data[array_rand($data)];
	$text = str_replace(array("\r","\n","\r\n"),'',$text);
}
$text = @rawurlencode($text);
$url = "https://api.telegram.org/bot{$token}/sendmessage?chat_id={$chat_id}&text={$text}";
if(strlen($url) <= $getdatamax){
	getHttps($url);
}
else{
	post($url);
}
?>