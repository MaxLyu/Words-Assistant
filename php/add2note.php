<?php
header("Content-type:application/json");
require_once("sqlconfig.php");
$conn = mysqli_connect($host, $username, $password);

if(! $conn){
	die("connect error: " . mysqli_error($conn));
}
mysqli_select_db( $conn, $dbname);

$keyword = trim($_POST["keyword"]);
$findword = "insert into note select * from vocabulary where word='$keyword' or interpretation='$keyword'";

$retval = mysqli_query($conn, $findword);
if($retval){
	echo json_encode(array("result" => true));
}
mysqli_close($conn);

?>