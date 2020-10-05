<?php
include_once './config.php';
include_once './function.php';
//$head = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
//获取反射信息
$update = json_decode(@file_get_contents('php://input'),true);
$chat_id = $update['message']['chat']['id'];
$name = $update['message']['from']['first_name'];
$msg = $update['message']['text'];
//发送给用户
//$text = "你好，世界，{$name}，{$msg}";
include './tgtext.php';
$text = @rawurlencode($text);
$url = "https://api.telegram.org/bot{$token}/sendmessage?text={$text}&chat_id={$chat_id}";
getHttps($url);
?>