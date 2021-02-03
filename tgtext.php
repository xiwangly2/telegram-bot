<?php
if($msg == "/off" && $username == $administrator){
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
elseif(preg_match('/ping /i',"{$msg}")){
	$ip = substr($msg,6);
	include_once './ping.php';
	$text = $sc;
}
elseif($msg == "/uuid" || $msg == "/uuid{$botname}"){
	$text = @uuid();
}
elseif($msg == "/dwz" || $msg == "/dwz{$botname}"){
	$text = "dwz <url>";
}
elseif(preg_match('/dwz /i',"{$msg}")){
	$url_dwz = @urlencode(substr($msg,5));
	$text= @getHttps("http://12n.top/dwz.php?url={$url_dwz}");
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
	$data = @file_get_contents($yiyanfilename);
	$data = explode(PHP_EOL,$data);
	$text = $data[array_rand($data)];
	$text = str_replace(array("\r","\n","\r\n"),'',$text);
}
elseif($msg == "/info" || $msg == "/info{$botname}"){
	$time_info = date("Y-m-d H:i:s",$chat_date);
	$text = "botname:{$botname}\ndate:{$chat_date}\ntime:{$time_info}\nmessage id:{$message_id}\nfrom:\n	id:{$from_id}\n	is bot:{$is_bot}\n	first name:{$first_name}\n	last name:{$last_name}\n	username:{$username}\n	language code:{$language_code}\nchat:\n	id:{$chat_id}\n	title:{$chat_title}\n	type:{$chat_type}\ntext:{$text}\nentities:\n	offset:{$entities_offset}\n	length:{$entities_length}\n	type:{$entities_type}";
}
@sendtgtext($text);
?>