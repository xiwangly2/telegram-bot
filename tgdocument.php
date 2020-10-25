<?php
if($msg == "/lolifile" || $msg == "/lolifile{$username}")
{
	$dir = '../images/';
	$list = @scandir($dir,0);
	$rand = @rand(2,@count($list)-'1');
	$file = $dir.$list[$rand];
	$text = "https://xiwangly.top/images/{$file}";
}
elseif($msg == "/wj" || $msg == "/wj{$username}")
{
}
$text = @rawurlencode($text);
$url = "https://api.telegram.org/bot{$token}/senddocument?chat_id={$chat_id}&document={$text}";
if(strlen($url) <= $getdatamax)
{
	getHttps($url);
}
else
{
	post($url);
}
?>