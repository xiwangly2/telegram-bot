<?php
include_once './config.php';
include_once './function.php';
//获取反射信息
$update = json_decode(@file_get_contents('php://input'),true);
$chat_id = $update['message']['chat']['id'];
$username = $update['message']['from']['username'];
$is_bot = $update['message']['from']['is_bot'];
$msg = $update['message']['text'];
if($debug = '1'){
	@file_put_contents('update.txt',print_r($update,true));
}
//发送给用户
if(!isset($msg) || $msg == '' || $is_bot != ''){
	die;
}
include './tgtext.php';
if(@file_get_contents('./switch.txt') == 'disabled'){
	die;
}
//開啟繁體（測試中）
//include './tgtext2.php';
include './tgphoto.php';
include './tgdocument.php';
?>