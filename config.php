<?php
//请联系@BotFather机器人注册自己的机器人，并填入下面的信息
//请勿泄露$token，如果已泄露，请联系@BotFather机器人更改$token
//$hookurl需要修改为自己的项目地址（网站必须使用https），完成后请访问webhook.php完成网络挂钩
//数据库信息是可选的，用于部分功能，填入后请导入dic.sql数据库
//$debug可能的值为0或1，用于开启日志记录和调试，默认关闭，填1开启
$token = '';
$connectroot = "https://api.telegram.org/bot{$token}/";
$http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
$http_host = $_SERVER['HTTP_HOST'];
$http_body = "{$http_type}{$http_host}";
$branch = 'telegram-bot';
$hookurl = "{$http_body}/{$branch}/index.php";
$botname = '@机器人用户名';
$administrator = '主人用户名';
$administrator_id = '主人id';
$getdatamax = '0';
$debug = '0';
$beta = '1';
//数据库信息
$host = 'host(:port)';
$sqlusername = '数据库用户名';
$password = '数据库密码';
$dbname = '数据库名';
$tablename = '数据库表名';
//可选的Webhook信息
$certificate = '';
$ip_address = '';
$max_connections = '40';
$allowed_updates = '';
$drop_pending_updates = 'false';
?>
