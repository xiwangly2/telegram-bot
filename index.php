<?php
include_once 'config.php';
include_once 'function.php';
//获取反射信息
$php_input = @file_get_contents('php://input');
if(empty($php_input)){
	die;
}
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
if(!empty($update['message']['entities']['0'])){
	$entities_offset = $update['message']['entities']['0']['offset'];
	$entities_length = $update['message']['entities']['0']['length'];
	$entities_type = $update['message']['entities']['0']['type'];
}
if(!empty($update['message']['entities']['1'])){
	$entities1_offset = $update['message']['entities']['1']['offset'];
	$entities1_length = $update['message']['entities']['1']['length'];
	$entities1_type = $update['message']['entities']['1']['type'];
	$entities1_user_id = $update['message']['entities']['1']['user']['id'];
	$entities1_user_is_bot = $update['message']['entities']['1']['user']['is_bot'];
	$entities1_user_first_name = $update['message']['entities']['1']['user']['first_name'];
	$entities1_user_language_code = $update['message']['entities']['1']['user']['language_code'];
}
//debug
if($debug == '1'){
/*
	if(!file_exists('update')){
		@mkdir('update');
	}
	if(empty($chat_date)){
		@file_put_contents("update/{$chat_id}_{$chat_date}.txt",json_encode($update,JSON_UNESCAPED_UNICODE));
	}
	*/
	@file_put_contents('update.txt',print_r($update,true));
	//@file_put_contents('update.txt',$php_input);
}
//读取开关状态
$switch = @file_get_contents('switch.txt');
include 'tgtext.php';
if($debug == '1'){
	//開啟繁體（測試中）
	include 'tgtext2.php';
	if($from_id == $chat_id){
		//私聊智能聊天，这个必须放在最后，否则前面的私聊消息会被遮挡
		unset($var2);
		include_once 'plugins/sqldic.php';
		$text = $rows['a'];
		if(!empty($text)){
			@sendtgtext($text);
		}
	}
}
?>