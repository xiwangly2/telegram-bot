<?php
include_once './config.php';
include_once './function.php';
$url = "https://api.telegram.org/bot{$token}/getMe";
getHttps($url,1);
?>