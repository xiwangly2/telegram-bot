<?php
include_once '../config.php';
//需要另外的表
$tablename = 'check in';
if(empty($var1)){
	$id = $msg;
}
else{
	$id = $var1;
}
//$id = $_GET['id'];
//$date = $_GET['date'];
//创建连接
$conn = new mysqli($host,$sqlusername,$password,$dbname);
if(empty($date)){
	$sql = "SELECT * from `{$tablename}` WHERE id=\"{$id}\"";
	$result = $conn->query($sql);
	$rows = mysqli_fetch_array($result);
	$rows_date = $rows['date'];
}
else{
	$sql = "REPLACE INTO `{$tablename}` (id,date)VALUES (\"{$id}\",\"{$date}\")";
	$conn->query($sql);
	$sql = "SELECT * from `{$tablename}` WHERE id=\"{$id}\"";
	$result = $conn->query($sql);
	$rows = mysqli_fetch_array($result);
	$rows_date = $rows['date'];
}
echo($rows_date);
$conn->close();
?>