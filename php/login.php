<?php
header("Content-type:application/json");
require_once("sqlconfig.php");
$conn = mysqli_connect($host, $username, $password);

if(! $conn){
	die("connect error: " . mysqli_error($conn));
}
mysqli_select_db( $conn, $dbname);

$user = trim($_POST["user"]);
$pwd = trim($_POST["pwd"]);

$sql = "select * from users where username='$user' and password='$pwd'";
$retval = mysqli_query($conn, $sql);
$rows=mysqli_num_rows($retval);

if(!$rows){
	$result = array("result" => false);
	echo json_encode($result);
}
else{
	$result = array("result" => true);
	echo json_encode($result);
}
mysqli_close($conn);
?>
