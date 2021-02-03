<?php
if($msg == "/lolifile" || $msg == "/lolifile{$botname}"){
	$dir = '../images/';
	$list = @scandir($dir,0);
	$rand = @rand(2,@count($list)-'1');
	$file = $dir.$list[$rand];
	$text = "https://xiwangly.top/images/{$file}";
}
elseif($msg == "/sqllolifile" || $msg == "/sqllolifile{$botname}"){
	$text = "https://xiwangly.top/images_r1.php";
}
@sendtgdocument($text);
?>