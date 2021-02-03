<?php
if($msg == "菜單" || $msg == "/菜單"){
	$text = @file_get_contents('./menu2.txt');
}
elseif(preg_match('/複讀/i',"{$msg}")){
	$text = substr($msg,6);
}
@sendtgtext($text);
?>