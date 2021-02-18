<?php
/**
由xiwangly编写，用于访问该接口快速运算一些值，请保留著作权，还在不断改进中……
教程：https://www.lolichan.vip/threads/qrspeed-6.53/
math.php?x=x的值&y=y的值&z=z的值&m=计算方式
*/
//header('content-type:text/html;charset=utf-8');
function sa($x,$y)
{
	$total=$x + $y;
	return $total;
}
function ss($x,$y)
{
	$total=$x - $y;
	return $total;
}
function sm($x,$y)
{
	$total=$x * $y;
	return $total;
}
function sd($x,$y)
{
	$total=$x / $y;
	return $total;
}
function sr($x,$y)
{
	$total=$x % $y;
	return $total;
}
function s($x,$y)
{
	$total=$x . $y;
	return $total;
}
function UnicodeEncode($x){
	preg_match_all('/./u',$x,$matches);
	$unicodeStr = '';
	foreach($matches[0] as $m1u){
//拼接
	$unicodeStr .= '&#' . base_convert(bin2hex(iconv('UTF-8','UCS-4',$m1u)),16,10) . ';';
	}
	return $unicodeStr;
}
function UnicodeDecode($x){
	$json = '{"str":"' . $x . '"}';
	$arr = json_decode($json,true);
	if(empty($arr)) return '';
	return $arr['str'];
}
if($x == ''&&$y == ''&&$z == ''&&$m == '')
{
	$text = '';
}
elseif($m == 'math')
{
	$text = '$x $z $y';
}

elseif($m == 'a'&&$z != '')
{
	$text = $x + $y + $z;
}
elseif($m == 'a')
{
	$text = sa($x,$y);
}
elseif($m == 's'&&$z != '')
{
	$text = $x - $y - $z;
}
elseif($m == 's')
{
	$text = ss($x,$y);
}
elseif($m == 'm'&&$z != '')
{
	$text = $x * $y * $z;
}
elseif($m == 'm')
{
	$text = sm($x,$y);
}
elseif($m == 'd'&&$z != '')
{
	$text = $x / $y / $z;
}
elseif($m == 'd')
{
	$text = sd($x,$y);
}
elseif($m == 'r'&&$z != '')
{
	$text = $x % $y % $z;
}
elseif($m == 'r')
{
	$text = sr($x,$y);
}
elseif($m == 'ss'&&$z != '')
{
	$text = $x . $y . $z;
}
elseif($m == 'ss')
{
	$text = s($x,$y);
}
elseif($m == 'pow')
{
	$text = pow($x,$y);
}
elseif($m == 'abs')
{
	$text = abs($x);
}
elseif($m == 'acos')
{
	$text = acos($x);
}
elseif($m == 'acosh')
{
	$text = acosh($x);
}
elseif($m == 'asin')
{
	$text = asin($x);
}
elseif($m == 'asinh')
{
	$text = asinh($x);
}
elseif($m == 'atan')
{
	$text = atan($x);
}
elseif($m == 'atan2')
{
	$text = atan2($x,$y);
}
elseif($m == 'atanh')
{
	$text = atanh($x);
}
elseif($m == 'base')
{
	$text = base_convert($x,$y,$z);
}
elseif($m == 'bindec')
{
	$text = bindec($x);
}
elseif($m == 'ceil')
{
	$text = ceil($x);
}
elseif($m == 'cos')
{
	$x=floatval($x);
	$text = cos($x);
}
elseif($m == 'cosh')
{
	$x=floatval($x);
	$text = cosh($x);
}
elseif($m == 'decbin')
{
	$text = decbin($x);
}
elseif($m == 'dechex')
{
	$text = dechex($x);
}
elseif($m == 'decoct')
{
	$text = decoct($x);
}
elseif($m == 'deg2rad')
{
	$text = deg2rad($x);
}
elseif($m == 'exp')
{
	$text = exp($x);
}
elseif($m == 'expm1')
{
	$text = expm1($x);
}
elseif($m == 'floor')
{
	$text = floor($x);
}
elseif($m == 'fmod')
{
	$text = fmod($x,$y);
}
elseif($m == 'getrandmax')
{
	$text = rand($x,getrandmax());
}
elseif($m == 'hexdec')
{
	$text = hexdec($x);
}
elseif($m == 'hypot')
{
	$text = hypot($x,$y);
}
elseif($m == 'finite')
{
	$text = is_finite($x);
}
elseif($m == 'infinite')
{
	$text = is_infinite($x);
}
elseif($m == 'nan')
{
	$text = is_nan($x);
}
elseif($m == 'lcg')
{
	$text = lcg_value();
}
elseif($m == 'log'&&$y == '')
{
	$text = log($x);
}
elseif($m == 'log')
{
	$text = log($x,$y);
}
elseif($m == 'log10')
{
	$text = log10($x);
}
elseif($m == 'log1p')
{
	$text = log1p($x);
}
elseif($m == 'max'&&$z == '')
{
	$text = max($x,$y);
}
elseif($m == 'max')
{
	$text = max($x,$y,$z);
}
elseif($m == 'min'&&$z == '')
{
	$text = min($x,$y);
}
elseif($m == 'min')
{
	$text = min($x,$y,$z);
}
elseif($m == 'mtgetrandmax')
{
	$text = mt_rand($x,mt_getrandmax());
}
elseif($m == 'mtrand')
{
	$text = mt_rand($x,$y);
}
elseif($m == 'mtsrand')
{
	$text = mt_srand($x);
}
elseif($m == 'octdec')
{
	$text = octdec($x);
}
elseif($m == 'pi')
{
	$text = pi();
}
elseif($m == 'rad2deg')
{
	$text = rad2deg($x);
}
elseif($m == 'rand')
{
	$text = rand($x,$y);
}
elseif($m == 'round')
{
	$text = round($x);
}
elseif($m == 'sin')
{
	$x=floatval($x);
	$text = sin($x);
}
elseif($m == 'sinh')
{
	$x=floatval($x);
	$text = sinh($x);
}
elseif($m == 'sqrt')
{
	$text = sqrt($x);
}
elseif($m == 'srand')
{
	$text = srand($x);
}
elseif($m == 'tan')
{
	$x=floatval($x);
	$text = tan($x);
}
elseif($m == 'tanh')
{
	$x=floatval($x);
	$text = tanh($x);
}
elseif($m == 'incremental')
{
	$text = cos($x);
}
elseif($m == 'aa')
{
	$text = ++$x;
}
elseif($m == 'rr')
{
	$text = --$x;
}
elseif($m == '$text =x')
{
	$text = $x;
}
elseif($m == '$text =y')
{
	$text = $y;
}
elseif($m == '$text =z')
{
	$text = $z;
}
elseif($m == 'e')
{
	$text = M_E;
}
elseif($m == 'euler')
{
	$text = M_EULER;
}
elseif($m == 'time')
{
	$text = time();
}
elseif($m == 'date')
{
	$text = date($x);
}
elseif($m == 'md5'&&$y == 'true')
{
	$text = md5($x,TRUE);
}
elseif($m == 'md5')
{
	$text = md5($x);
}
elseif($m == 'uniqid'&&$y == 'true')
{
	$text = uniqid($x,TRUE);
}
elseif($m == 'uniqid')
{
	$text = uniqid($x);
}
elseif($m == 'tf')
{
	$tf=mt_rand(0,1);
	if($tf == '1')
	{
		$text = 'true';
	}
	elseif($tf == '0')
	{
		$text = 'false';
	}
}
elseif($m == 'md5file')
{
	$text = md5_file($x);
}
elseif($m == 'base64encode')
{
	$text = base64_encode($x);
}
elseif($m == 'base64decode')
{
	$text = base64_decode($x);
}
elseif($m == 'and')
{
	if($x and $y)
	{
		$text = '1';
	}
	else
	{
		$text = '0';
	}
}
elseif($m == 'or')
{
	if($x or $y)
	{
		$text = '1';
	}
	else
	{
		$text = '0';
	}
}
elseif($m == 'xor')
{
	if($x xor $y)
	{
		$text = '1';
	}
	else
	{
		$text = '0';
	}
}
elseif($m == 'andand')
{
	if($x && $y)
	{
		$text = '1';
	}
	else
	{
		$text = '0';
	}
}
elseif($m == 'oror')
{
	if($x || $y)
	{
		$text = '1';
	}
	else
	{
		$text = '0';
	}
}
elseif($m == 'not')
{
	if($x != $y)
	{
		$text = '1';
	}
	else
	{
		$text = '0';
	}
}
elseif($m == 'equal')
{
	if($x == $y)
	{
		$text = 'true';
	}
	else
	{
		$text = 'false';
	}
}
elseif($m == 'lessgreater')
{
	if($x <> $y)
	{
		$text = 'true';
	}
	else
	{
		$text = 'false';
	}
}
elseif($m == 'greater')
{
	if($x > $y)
	{
		$text = 'true';
	}
	else
	{
		$text = 'false';
	}
}
elseif($m == 'less')
{
	if($x < $y)
	{
		$text = 'true';
	}
	else
	{
		$text = 'false';
	}
}
elseif($m == 'greaterequal')
{
	if($x >= $y)
	{
		$text = 'true';
	}
	else
	{
		$text = 'false';
	}
}
elseif($m == 'lessequal')
{
	if($x <= $y)
	{
		$text = 'true';
	}
	else
	{
		$text = 'false';
	}
}
elseif($m == 'areacircle')
{
	$text = M_PI * $x * $x;
}
elseif($m == 'floatval')
{
	$text = floatval($x);
}
elseif($m == 'doubleval')
{
	$text = doubleval($x);
}
elseif($m == 'intval')
{
	$text = intval($x);
}
elseif($m == 'boolval')
{
	$text = boolval($x) ? 'true' : 'false';
}
elseif($m == 'empty')
{
	if(empty($x))
	{
		$text = 'true';
	}
	else
	{
		$text = 'false';
	}
}
elseif($m == 'uuencode')
{
	$text = convert_uuencode($x);
}
elseif($m == 'uudecode')
{
	$text = convert_uudecode($x);
}
elseif($m == 'cmp')
{
	if($x < $y)
	{
		$text = '-1';
	}
	elseif($x == $y)
	{
		$text = '0';
	}
	elseif($x > $y)
	{
		$text = '1';
	}
}
elseif($m == 'preg')
{
	$keywords = preg_match('$x','$y');
	$text = $keywords;
}
elseif($m == 'bin2hex')
{
	$text = bin2hex($x);
}
elseif($m == 'pack')
{
	$text = pack($x,$y);
}
elseif($m == 'chr')
{
	$text = chr($x);
}
elseif($m == 'crypt'&&$y == '')
{
	$text = crypt($x);
}
elseif($m == 'crypt')
{
	$text = crypt($x,$y);
}
elseif($m == 'crc32')
{
	$text = sprintf('%u',crc32($x));
}
elseif($m == 'hebrev'&&$y == '')
{
	$text = hebrev($x);
}
elseif($m == 'hebrev')
{
	$text = hebrev($x,$y);
}
elseif($m == 'hebrevc'&&$y == '')
{
	$text = hebrevc($x);
}
elseif($m == 'hebrevc')
{
	$text = hebrevc($x,$y);
}
elseif($m == 'unicodeencode')
{
	$text = UnicodeEncode($x);
}
elseif($m == 'unicodedecode')
{
	$text = UnicodeDecode($x);
}
elseif($m == '2base64encode')
{
	$x1=base64_encode($x);
	$text = base64_encode($x1);
}
elseif($m == '2base64decode')
{
	$x1=base64_encode($x);
	$text = base64_decode($x1);
}
elseif($m == 'fc')
{
	$text = $x <=> $y;
}
elseif($m == 'aand')
{
	$text = $x & $y;
}
elseif($m == 'aor')
{
	$text = $x | $y;
}
elseif($m == 'axor')
{
	$text = $x ^ $y;
}
elseif($m == 'anot')
{
	$text = ~$x;
}
elseif($m == 'aall')
{
	$text = $x << $y;
}
elseif($m == 'aarr')
{
	$text = $x >> $y;
}
elseif($m == 'aaaaa')
{
	while($x <= $z){
		$y=$y + $x;
		$x++;
	}
	$text = $y;
}
elseif($m == 'sssss')
{
	while($x <= $z){
		$y=$y - $x;
		$x++;
	}
	$text = $y;
}
elseif($m == 'mmmmm')
{
	while($x <= $z){
		$y=$y * $x;
		$x++;
	}
	$text = $y;
}
elseif($m == 'ddddd')
{
	while($x <= $z){
		$y=$y / $x;
		$x++;
	}
	$text = $y;
}
elseif($m == 'rrrrr')
{
	while($x <= $z){
		$y=$y % $x;
		$x++;
	}
	$text = $y;
}
elseif($m == 'ppppp')
{
	while($x <= $z){
		$y=$y ^ $x;
		$x++;
	}
	$text = $y;
}
elseif($m == 'urlencode')
{
	$text = urlencode($x);
}
elseif($m == 'urldecode')
{
	$text = urldecode($x);
}

else
{
	$text = "未知的表达：m={$m}";
}
?>