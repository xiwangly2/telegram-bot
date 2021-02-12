<?php
function sendtgtext($text){
	//发送文本消息
	global $connectroot,$chat_id,$getdatamax;
	$text = @rawurlencode($text);
	$url = "{$connectroot}sendmessage?chat_id={$chat_id}&text={$text}";
	if(strlen($url) <= $getdatamax){
		getHttps($url);
	}
	else{
		post("{$connectroot}sendmessage","chat_id={$chat_id}&text={$text}");
	}
}
function sendtgphoto($text){
	//发送图片消息
	global $connectroot,$chat_id,$getdatamax;
	$text = @rawurlencode($text);
	$url = "{$connectroot}sendphoto?chat_id={$chat_id}&photo={$text}";
	if(strlen($url) <= $getdatamax){
		getHttps($url);
	}
	else{
		post("{$connectroot}sendphoto","chat_id={$chat_id}&photo={$text}");
	}
}
function sendtgdocument($text){
	//发送文档消息
	global $connectroot,$chat_id,$getdatamax;
	$text = @rawurlencode($text);
	$url = "{$connectroot}senddocument?chat_id={$chat_id}&document={$text}";
	if(strlen($url) <= $getdatamax){
		getHttps($url);
	}
	else{
		post("{$connectroot}senddocument","chat_id={$chat_id}&document={$text}");
	}
}
function getHttps($url,$isoutput = 1){
	//获取https网页内容，GET请求
	//初始化
	$ch = curl_init();
	//设置选项，包括URL
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_HEADER,0);
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
	//https请求 不验证证书和hosts
	curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
	$output = curl_exec($ch);
	//执行并获取HTML文档内容
	if($isoutput == 1 || $isoutput == true)
	{
		return $output;//输出回调
	}
	elseif($isoutput == 2)
	{
		@file_put_contents('./curldata.txt');//写入文件
	}
	//$isoutput为0或其他则仅访问不输出
	//$str = htmlspecialchars($output);
	//释放curl句柄
	curl_close($ch);
}
function post($url,$post_string = ''){
	//POST请求
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_POSTFIELDS,$post_string);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch, CURLOPT_USERAGENT,"xiwangly CURL Example beta");
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}
function uuid(){
	//生成UUID
	$chars = md5(uniqid(mt_rand(),true));
	$uuid = substr($chars,0,8).'-'.substr($chars,8,4).'-'.substr($chars,12,4).'-'.substr($chars,16,4).'-'.substr($chars,20,12);
	return $uuid;
}
function pre($msg){
	//正则表达式解析文本参数
	//使用空格分隔短语
	$array = preg_split("/( )+/",$msg);
	$num = count($array);
	for($i = 0;$i < $num;$i++){
		$c = 'var'.$i;
		global $$c;
		$$c = $array[$i];
	}
}