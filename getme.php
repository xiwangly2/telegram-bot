<?php
include_once 'config.php';
include_once 'function.php';
$url = "{$connectroot}getMe";
if($debug == '1'){
	echo(getHttps($url,1));
}
?>