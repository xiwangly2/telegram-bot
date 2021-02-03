<?php
if($msg == "来份萝莉" || $msg == "/来份萝莉" || $msg == "/loli" || $msg == "/loli{$botname}"){
	$dir = '../images/';
	$list = @scandir($dir,0);
	$rand = @rand(2,@count($list)-'1');
	$file = $dir.$list[$rand];
	$text = "https://xiwangly.top/images/{$file}";
}
@sendtgphoto($text);
?>