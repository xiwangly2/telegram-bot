<?php
include_once 'config.php';
include_once 'function.php';
$url = "{$connectroot}getMe";
echo(getHttps($url,1));
?>