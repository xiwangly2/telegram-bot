<?php
if($msg == '菜單' || $msg == '/菜單'){
	$menu = preg_split("/(language.+)/",@file_get_contents('menu.txt'));
	@sendtgtext($menu[2]);
}
elseif(preg_match('/複讀 m/i',"{$msg}") && $username == $administrator){
	$text = substr($msg,9);
	@sendtgtext($text,'MarkdownV2');
}
elseif(preg_match('/複讀 h/i',"{$msg}") && $username == $administrator){
	$text = substr($msg,9);
	@sendtgtext($text,'HTML');
}
elseif(preg_match('/複讀/i',"{$msg}") && $username == $administrator){
	$text = substr($msg,7);
	@sendtgtext($text);
}
elseif($msg == '來份蘿莉' || $msg == '/來份蘿莉'){
	$dir = '../images/';
	$list = @scandir($dir,0);
	$rand = @rand(2,@count($list)-'1');
	$file = $dir.$list[$rand];
	$text = "{$http_body}/images/{$file}";
	@sendtgphoto($text);
}
elseif($var0 == '/簽到' || $msg == "/簽到{$botname}"){
	$var1 = $from_id;
	include 'plugins/check_in.php';
	if(date('d',$rows_date) != date('d',time())){
		include 'plugins/gold.php';
		$var2 = $rows_number + mt_rand(8,64);
		include 'plugins/gold.php';
		$date = time();
		include 'plugins/check_in.php';
		@sendtgtext("Success!Gold coins increased by {$var2}.");
	}
	else{
		@sendtgtext('Checked in today.');
	}
}
?>