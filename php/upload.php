<?php
header("Content-type:application/json");
require_once("sqlconfig.php");
$conn = mysqli_connect($host, $username, $password);

if(! $conn){
	die("connect error: " . mysqli_error($conn));
}
mysqli_select_db( $conn, $dbname);

$content=file_get_contents($_FILES['file']['tmp_name']);
$name = $_FILES['file']['name'];
$sql = "insert into article values ('$name', '$content')";

$result = mysqli_query($conn, $sql);
if($result){
	echo "<script>alert('成功!')</script>";
}
mysqli_close($conn);
?>