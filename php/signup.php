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

$findsql = "select username from users where username='$user'";
$result = mysqli_fetch_array(mysqli_query($conn, $findsql));

if($result["username"] == $user){
	$result = array("result" => false);
	echo json_encode($result);
}
else{
	$insertsql = "insert into users values ('$user', '$pwd')";
	$result = mysqli_query($conn, $insertsql);
	if($result){
		$result = array("result" => true);
		echo json_encode($result);
	}
}
mysqli_close($conn);
?>