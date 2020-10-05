<?php
if(!isset($msg) || $msg == '')
{
	die;
}
elseif($msg=="菜单")
{
	$text = "还没有菜单呢(^_^)";
}
elseif($msg=="/")
{
	$text = "命令";
}
elseif($msg=="/start")
{
	$text = "输入菜单试试？";
}
elseif(preg_match('/复读/i',"{$msg}"))
{
	$text = substr($msg,6);
}
@file_put_contents('msg.txt',$msg);
?>