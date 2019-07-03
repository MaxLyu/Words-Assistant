<?php
header("Content-type:application/json");
require_once("sqlconfig.php");
$conn = mysqli_connect($host, $username, $password);

if(! $conn){
	die("connect error: " . mysqli_error($conn));
}
mysqli_select_db( $conn, $dbname);

$keyword = trim($_GET["keyword"]);
$sql = "delete from vocabulary where word='$keyword' or interpretation='$keyword'";
$result = mysqli_query($conn, $sql);

if(!$result){
	echo json_encode(array("result" => false));
}
else{
	echo json_encode(array("result" => true));
}

?>