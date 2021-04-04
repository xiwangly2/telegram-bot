<?php
/*
数据库编码推荐utf8mb4
*/
include_once '../config.php';
if(empty($var1)){
	$q = $msg;
}
else{
	$q = $var1;
}
$a = $var2;
//创建连接
$conn = new mysqli($host,$sqlusername,$password,$dbname);
if(empty($a)){
	$sql = "SELECT * from `{$tablename}` WHERE q=\"{$q}\"";
	$result = $conn->query($sql);
	$rows = mysqli_fetch_array($result);
}
else{
	$sql = "DELETE FROM `{$tablename}` WHERE q=\"{$q}\"";
	$conn->query($sql);
	$sql = "INSERT INTO `{$tablename}` (q,a)VALUES (\"{$q}\",\"{$a}\")";
	$conn->query($sql);
	$sql = "SELECT * from `{$tablename}` WHERE q=\"{$q}\"";
	$result = $conn->query($sql);
	$rows = mysqli_fetch_array($result);
}
//echo $rows['a'];
$conn->close();
?>