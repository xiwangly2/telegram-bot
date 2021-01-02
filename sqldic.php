<?php
/*
数据库编码推荐utf8mb4
*/
include_once './config.php';
//get参数
$q = $_GET["q"];
if(!isset($q) || $q == '')
{
	$q = $msg;
}
$a = $_GET["a"];
//创建连接
$conn = new mysqli($host, $sqlusername, $password, $dbname);
//设置编码
$sql = "DEFAULT CHARSET=utf8mb4";
$conn->query($sql);
//使用sql创建数据表
$sql = "CREATE TABLE $tablename (id INT(64) UNSIGNED AUTO_INCREMENT PRIMARY KEY,q VARCHAR(128) NOT NULL,a VARCHAR(1280) NOT NULL,reg_date TIMESTAMP)";
$conn->query($sql);
$sql = "SELECT id, q, a FROM $tablename";
$conn->query($sql);
if($a == "")
{
	$sql = "SELECT * from $tablename WHERE q=\"{$q}\"";
	$result = $conn->query($sql);
	$rows = mysqli_fetch_array($result);
	//echo $rows["a"];
}
else
{
	$sql = "DELETE FROM $tablename WHERE q=\"{$q}\"";
	$conn->query($sql);
	$sql = "INSERT INTO $tablename (q,a)VALUES (\"{$q}\",\"{$a}\")";
	$conn->query($sql);
	$sql = "SELECT * from $tablename WHERE q=\"{$q}\"";
	$result = $conn->query($sql);
	$rows = mysqli_fetch_array($result);
	//echo $rows["a"];
}
$conn->close();
?>