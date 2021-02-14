<?php
/*
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
$host = 'host(:port)';
$sqlusername = '数据库用户名';
$password = '数据库密码';
$dbname = '数据库名';
$tablename = '数据库表名';
$debug = '0';
*/
$token = '1270710988:AAE_C5V7cX4ON_yEvcrvhluMIqKqyvDEOGI';
$connectroot = "https://api.telegram.org/bot{$token}/";
$http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
$http_host = $_SERVER['HTTP_HOST'];
$http_body = "{$http_type}{$http_host}";
$branch = 'telegram-bot';
$hookurl = "{$http_body}/{$branch}/index.php";
$botname = '@xiwangly_bot';
$administrator = 'xiwangly';
$administrator_id = '1367850918';
$getdatamax = '0';
$host = 'localhost';
$sqlusername = 'dic';
$password = 'LY1334850101';
$dbname = 'dic';
$tablename = 'dic';
$debug = '1';
?>