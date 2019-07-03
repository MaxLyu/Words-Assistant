<?php 

header("Content-type:application/json");
require_once("sqlconfig.php");
$conn = mysqli_connect($host, $username, $password);

if(! $conn){
	die("connect error: " . mysqli_error($conn));
}
mysqli_select_db( $conn, $dbname);

$keyword = trim($_GET["word"]);
$en = "select * from vocabulary where word='$keyword'";
$cn = "select * from vocabulary where interpretation='$keyword'";

if($_GET["ways"]=="word"){
	$retval = mysqli_query($conn, $en);
	if($retval){
		$search_result = array();
		while($row = mysqli_fetch_assoc($retval)){
		  $search_result[] = $row;
		}
		// 将数组转成json格式
		echo json_encode($search_result);
	}
}
if($_GET["ways"]=="interpretation"){
	$retval = mysqli_query($conn, $cn);
	if($retval){
		$search_result = array();
		while($row = mysqli_fetch_assoc($retval)){
		  $search_result[] = $row;
		}
		// 将数组转成json格式
		echo json_encode($search_result);
	}
	
}

mysqli_close($conn);

?>
