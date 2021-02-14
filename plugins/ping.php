<?php
if(substr(php_uname("s"),0,3) == "Win"){
	header("content-type:text/html;charset=GBK");
	$sc = shell_exec("ping -n 3 {$ip}");
	header("content-type:text/html;charset=UTF-8");
	$sc = iconv("GBK","UTF-8",$sc);
}
else{
	header("content-type:text/html;charset=UTF-8");
	$sc = shell_exec("ping -c 3 {$ip}");
}
?>