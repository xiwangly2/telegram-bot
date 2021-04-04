<?php
include_once '../config.php';
//需要另外的表
$tablename = 'gold';
if(empty($var1)){
	$id = $msg;
}
else{
	$id = $var1;
}
$number = $var2;
//$id = $_GET['id'];
//$number = $_GET['number'];
//创建连接
$conn = new mysqli($host,$sqlusername,$password,$dbname);
if(empty($number)){
	$sql = "SELECT * from `{$tablename}` WHERE id=\"{$id}\"";
	$result = $conn->query($sql);
	$rows = mysqli_fetch_array($result);
	$rows_number = $rows['number'];
	if($rows_number == ''){
		$rows_number == 0;
		$sql = "REPLACE INTO `{$tablename}` (id,number)VALUES (\"{$id}\",\"{$rows_number}\")";
		$conn->query($sql);
	}
}
else{
	$sql = "REPLACE INTO `{$tablename}` (id,number)VALUES (\"{$id}\",\"{$number}\")";
	$conn->query($sql);
	$sql = "SELECT * from `{$tablename}` WHERE id=\"{$id}\"";
	$result = $conn->query($sql);
	$rows = mysqli_fetch_array($result);
	$rows_number = $rows['number'];
}
//echo($rows_number);
$conn->close();
?>