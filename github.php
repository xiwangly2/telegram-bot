<?php
/*
//Payload URL:{$http_body}/{$branch}/github.php
//content type:application/json
//SSL verification:Enable SSL verification
//Active:true
*/
include_once 'config.php';
include_once 'function.php';
//获取反射信息
$php_input = @file_get_contents('php://input');
if(empty($php_input)){
	die;
}
$update = json_decode($php_input,true);
$chat_id = $administrator_id;
//解析反射信息
$github_ref = $update['ref'];
$github_before = $update['before'];
$github_after = $update['after'];
$github_repository_id = $update['repository']['id'];
$github_repository_name = $update['repository']['name'];
$github_repository_full_name = $update['repository']['full_name'];

$github_repository_url = $update['repository']['url'];
//debug
if($debug == '1'){
	@file_put_contents('github_update.txt',print_r($update,true));
	//@file_put_contents('github_update.txt',$php_input);
}
//读取开关状态
$switch = @file_get_contents('switch.txt');
//开关
if($switch == 'disabled'){
	die;
}
if(!empty($github_ref) && !empty($github_before) && !empty($github_after)){
	$add1 = "ref:{$github_ref}\n前:{$github_before}\n后:{$github_after}\n";
}
$text = "您的GitHub有新的消息\n{$add1}库:\n\tid:{$github_repository_id}\n\tname:{$github_repository_name}\n\tfull name:{$github_repository_full_name}\n\turl:{$github_repository_url}\n更多请查看:{$http_body}/telegram-bot/github_update.txt";
@sendtgtext($text);
?>