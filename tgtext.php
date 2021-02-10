<?php
//如果文本为空或机器人的消息则终止（防机器人间循环发送消息消耗服务器流量）
//群组中消息需要加/前缀触发命令,注意参数有无空格
if(empty($msg) || $is_bot == '1'){
	die;
}
elseif($msg == "/on" && $username == $administrator){
		if($switch == 'enabled'){
		@sendtgtext('Bot is running.');
	}
	elseif(empty($switch)){
		@file_put_contents('./switch.txt','enabled');
		@sendtgtext('Bot is running.');
		@sendtgtext('The robot may be running for the first time, welcome to use.');
	}
	else{
	@file_put_contents('./switch.txt','enabled');
	@sendtgtext('Bot is enabled.');
	}
}
//开关
if(@file_get_contents('./switch.txt') == 'disabled'){
	die;
}
elseif($msg == "/off" && $username == $administrator){
	@file_put_contents('./switch.txt','disabled');
	@sendtgtext('Bot is disabled.');
}
elseif($msg == "菜单" || $msg == "/菜单" || $msg == "help" || $msg == "/help" || $msg == "/help{$botname}"){
	@sendtgtext(@file_get_contents('./menu.txt'));
}
elseif($msg == "/start" || $msg == "/start{$botname}"){
	@sendtgtext('输入 /菜单 试试？');
}
elseif(preg_match('/复读/i',"{$msg}")){
	@sendtgtext(substr($msg,7));
}
elseif($msg == "/ping" || $msg == "/ping{$botname}"){
	@sendtgtext('ping <ip>');
}
elseif(preg_match('/ping /i',"{$msg}")){
	$ip = substr($msg,6);
	include_once './ping.php';
	@sendtgtext($sc);
}
elseif($msg == "/uuid" || $msg == "/uuid{$botname}"){
	@sendtgtext(@uuid());
}
elseif($msg == "/dwz" || $msg == "/dwz{$botname}"){
	@sendtgtext('dwz <url>');
}
elseif(preg_match('/dwz /i',"{$msg}")){
	$url_dwz = @urlencode(substr($msg,5));
	$text= @getHttps("http://12n.top/dwz.php?url={$url_dwz}",1);
	@sendtgtext($text);
}
elseif(preg_match('/m/i',"{$msg}")){
	$msg = substr($msg,2);
	include_once './sqldic.php';
	$text = $rows['a'];
	@sendtgtext($text);
}
elseif($msg == "/yiyan" || $msg == "/yiyan{$botname}"){
	$yiyanfilename = './yiyandata.dat';
	if(!file_exists($yiyanfilename)){
		die;
	}
	$data = @file_get_contents($yiyanfilename);
	$data = explode(PHP_EOL,$data);
	$text = $data[array_rand($data)];
	$text = str_replace(array("\r","\n","\r\n"),'',$text);
	@sendtgtext($text);
}
elseif($msg == "/info" || $msg == "/info{$botname}"){
	$time_info = date("Y-m-d H:i:s",$chat_date);
	$text = "botname:{$botname}\ndate:{$chat_date}\ntime:{$time_info}\nmessage id:{$message_id}\nfrom:\n\tid:{$from_id}\n\tis bot:{$is_bot}\n\tfirst name:{$first_name}\n\tlast name:{$last_name}\n\tusername:{$username}\n\tlanguage code:{$language_code}\nchat:\n\tid:{$chat_id}\n\ttitle:{$chat_title}\n\ttype:{$chat_type}\ntext:{$text}\nentities:\n\toffset:{$entities_offset}\n\tlength:{$entities_length}\n\ttype:{$entities_type}";
	@sendtgtext($text);
}
elseif($msg == "来份萝莉" || $msg == "/来份萝莉" || $msg == "/loli" || $msg == "/loli{$botname}"){
	$dir = '../images/';
	$list = @scandir($dir,0);
	$rand = @rand(2,@count($list)-'1');
	$file = $dir.$list[$rand];
	$http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
	$http_host = $_SERVER['HTTP_HOST'];
	$text = "{$http_type}{$http_host}/images/{$file}";
	@sendtgphoto($text);
}
elseif($msg == "/lolifile" || $msg == "/lolifile{$botname}"){
	$dir = '../images/';
	$list = @scandir($dir,0);
	$rand = @rand(2,@count($list)-'1');
	$file = $dir.$list[$rand];
	$http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
	$http_host = $_SERVER['HTTP_HOST'];
	$text = "{$http_type}{$http_host}/images/{$file}";
	@sendtgdocument($text);
}
?>
