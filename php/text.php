<?php
header("Content-type:application/json");
require_once("sqlconfig.php");
$conn = mysqli_connect($host, $username, $password);

if(! $conn){
	die("connect error: " . mysqli_error($conn));
}
mysqli_select_db( $conn, $dbname);

$sql = "SELECT word,interpretation FROM vocabulary ORDER BY RAND() LIMIT 1";
$result = mysqli_query($conn, $sql);
if($result){
	$search_result = array();
	while($row = mysqli_fetch_assoc($result)){
	  $search_result[] = $row;
	}
	// 将数组转成json格式
	echo json_encode($search_result);
}
?>