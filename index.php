<?php
include_once './config.php';
include_once './function.php';
//获取反射信息
$php_input = @file_get_contents('php://input');
$update = json_decode($php_input,true);
//解析反射信息
$msg = $update['message']['text'];
$is_bot = $update['message']['from']['is_bot'];
$update_id = $update['update_id'];
//message
$message_id = $update['message']['message_id'];
//message from
$from_id = $update['message']['from']['id'];
$first_name = $update['message']['from']['first_name'];
$last_name = $update['message']['from']['last_name'];
$username = $update['message']['from']['username'];
$language_code = $update['message']['from']['language_code'];
//message chat
$chat_id = $update['message']['chat']['id'];
$chat_title = $update['message']['chat']['title'];
$chat_type = $update['message']['chat']['type'];
$chat_date = $update['message']['date'];
//message entities
$entities_type = $update['message']['entities']['0']['type'];
if(!empty($entities_type)){
	$entities_offset = $update['message']['entities']['0']['offset'];
	$entities_length = $update['message']['entities']['0']['length'];
}
//debug
if($debug = '1'){
/*
	if(!file_exists('update')){
		@mkdir('update');
	}
	if(empty($chat_date)){
		@file_put_contents("update/{$chat_id}_{$chat_date}.txt",json_encode($update,JSON_UNESCAPED_UNICODE));
	}
	*/
	@file_put_contents('update.txt',$php_input);
}
//如果文本为空或机器人的消息则终止
if(empty($msg) || $is_bot == 'true'){
	die;
}
if($msg == "/on" && $username == $administrator){
	@file_put_contents('./switch.txt','enabled');
	$text = "Bot is enabled.";
}
//开关
if(@file_get_contents('./switch.txt') == 'disabled'){
	die;
}
include './tgtext.php';
//開啟繁體（測試中）
//include './tgtext2.php';
include './tgphoto.php';
include './tgdocument.php';
?>