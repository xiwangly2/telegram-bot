<?php
function getHttps($url)
{	//初始化
	$ch = curl_init();
	//设置选项，包括URL
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // https请求 不验证证书和hosts
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	$output = curl_exec($ch); //执行并获取HTML文档内容
	//echo $output;
	//$str = htmlspecialchars($output);//转换为源代码形式
	//释放curl句柄
	curl_close($ch);
return $str;
}
function getHttpsOutput($url)
{	//初始化
	$ch = curl_init();
	//设置选项，包括URL
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // https请求 不验证证书和hosts
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	$output = curl_exec($ch); //执行并获取HTML文档内容
	echo $output;
	//$str = htmlspecialchars($output);//转换为源代码形式
	//释放curl句柄
	curl_close($ch);
return $str;
}
?>