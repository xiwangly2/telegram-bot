<?php
if($msg == "/lolifile" || $msg == "/lolifile{$botname}"){
	$dir = '../images/';
	$list = @scandir($dir,0);
	$rand = @rand(2,@count($list)-'1');
	$file = $dir.$list[$rand];
	$text = "https://xiwangly.top/images/{$file}";
}
$text = @rawurlencode($text);
$url = "{$connectroot}senddocument?chat_id={$chat_id}&document={$text}";
if(strlen($url) <= $getdatamax){
	getHttps($url);
}
else{
	post("{$connectroot}senddocument","chat_id={$chat_id}&document={$text}");
}
?>