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
		@file_put_contents('switch.txt','enabled');
		@sendtgtext('Bot is running.');
		@sendtgtext('The robot may be running for the first time, welcome to use.');
	}
	else{
	@file_put_contents('switch.txt','enabled');
	@sendtgtext('Bot is enabled.');
	}
}
//开关
//正则表达式预解析
@pre($msg);
if(@file_get_contents('switch.txt') == 'disabled'){
	die;
}
elseif($msg == "/off" && $username == $administrator){
	@file_put_contents('switch.txt','disabled');
	@sendtgtext('Bot is disabled.');
}
elseif($msg == "菜单" || $msg == "/菜单" || $msg == "help" || $msg == "/help" || $msg == "/help{$botname}"){
	$menu = preg_split("/(language.+)/",@file_get_contents('menu.txt'));
	@sendtgtext($menu[1]);
}
elseif($msg == "/start" || $msg == "/start{$botname}"){
	@sendtgtext('输入 /菜单 试试？');
}
elseif(preg_match('/复读/i',"{$msg}") && $username == $administrator){
	$text = substr($msg,7);
	@sendtgtext($text);
}
elseif($msg == "/ping" || $msg == "/ping{$botname}"){
	@sendtgtext('ping <ip>');
}
elseif($var0 == '/ping'){
	@sendtgtext('请耐心等待...');
	$ip = $var1;
	include_once 'plugins/ping.php';
	@sendtgtext($sc);
}
elseif($msg == "/uuid" || $msg == "/uuid{$botname}"){
	@sendtgtext(@uuid());
}
elseif($msg == "/dwz" || $msg == "/dwz{$botname}"){
	@sendtgtext('dwz <url>');
}
elseif($var0 == '/dwz'){
	@sendtgtext('请耐心等待...');
	$url_dwz = $var1;
	$text= @getHttps("http://12n.top/dwz.php?url={$url_dwz}",1);
	@sendtgtext($text);
}
elseif($var0 == '/m'){
	//群聊智能聊天
	include_once 'plugins/sqldic.php';
	$text = $rows['a'];
	if(!empty($text)){
		@sendtgtext($text);
	}
}
elseif($msg == "/yiyan" || $msg == "/yiyan{$botname}"){
	$yiyanfilename = 'plugins/yiyandata.dat';
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
	if($username == $administrator){
		$info_admin = 'true';
	}
	else{
		$info_admin = 'false';
	}
	$text = "botname:{$botname}\ndate:{$chat_date}\ntime:{$time_info}\nmessage id:{$message_id}\nfrom:\n\tid:{$from_id}\n\tis bot:{$is_bot}\n\tfirst name:{$first_name}\n\tlast name:{$last_name}\n\tusername:{$username}\n\tis bot admin:{$info_admin}\n\tlanguage code:{$language_code}\nchat:\n\tid:{$chat_id}\n\ttitle:{$chat_title}\n\ttype:{$chat_type}\ntext:{$text}\nentities:\n\toffset:{$entities_offset}\n\tlength:{$entities_length}\n\ttype:{$entities_type}\ndebug:{$debug}";
	@sendtgtext($text);
}
elseif($msg == "来份萝莉" || $msg == "/来份萝莉" || $msg == "/loli" || $msg == "/loli{$botname}"){
	//可能需要重新指定路径
	$dir = '../images/';
	$list = @scandir($dir,0);
	$rand = @rand(2,@count($list)-'1');
	$file = $dir.$list[$rand];
	$text = "{$http_body}/images/{$file}";
	@sendtgphoto($text);
}
elseif($msg == "/lolifile" || $msg == "/lolifile{$botname}"){
	//可能需要重新指定路径
	$dir = '../images/';
	$list = @scandir($dir,0);
	$rand = @rand(2,@count($list)-'1');
	$file = $dir.$list[$rand];
	$text = "{$http_body}/images/{$file}";
	@sendtgdocument($text);
}
elseif($var0 == '/dic' && $username == $administrator && $var2 != ''){
	//群聊智能聊天
	include_once 'plugins/sqldic.php';
	$re1 = $rows['a'];
	$text = "增加成功！\nQ：{$var1}\nA：{$re1}";
	@sendtgtext($text);
}
elseif($msg == "/reset" || $msg == "/reset{$botname}"){
	if($username == $administrator){
		@sendtgtext('The robot is about to reset.');
		@unlink('webhook.lck');
		@sendtgtext('The robot has been reset.');
	}
}
elseif($var0 == '/math' && $var4 != ''){
	//math
	$x = $var1;
	$y = $var2;
	$z = $var3;
	$m = $var4;
	include_once 'plugins/math.php';
	@sendtgtext($text);
}
elseif($var0 == '/math' && $var3 != ''){
	//math
	$x = $var1;
	$y = $var2;
	$m = $var3;
	include_once 'plugins/math.php';
	@sendtgtext($text);
}
elseif($var0 == '/math' && $var2 != ''){
	//math
	$x = $var1;
	$m = $var2;
	include_once 'plugins/math.php';
	@sendtgtext($text);
}
elseif($var0 == '/math' && $var1 != ''){
	//math
	$m = $var1;
	include_once 'plugins/math.php';
	@sendtgtext($text);
}
elseif($msg == "/math" || $msg == "/math{$botname}"){
	//math
	@sendtgtext('math <x*> <y*> <z*> <m>');
	@sendtgtext('For help,please check https://github.com/xiwangly2/math-API/blob/master/README.md');
}
elseif($from_id == $chat_id){
	//私聊智能聊天，这个必须放在最后，否则前面的私聊消息会被遮挡
	include_once 'plugins/sqldic.php';
	$text = $rows['a'];
	if(!empty($text)){
		@sendtgtext($text);
	}
}
?>