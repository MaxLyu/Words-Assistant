<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>单词助手</title>
 
</head>
<body>

<?php 

require_once("sqlconfig.php");
$conn = mysqli_connect($host, $username, $password);

if(! $conn){
	die("connect error: " . mysqli_error($conn));
}
mysqli_select_db( $conn, $dbname);
$isword = "select * from vocabulary where word='$_POST[word]' and chara='$_POST[chara]'";
$result = mysqli_query($conn, $isword);
if(! $result){
	$sql="INSERT INTO vocabulary (word, chara, interpretation, pronounction, difficulty, engexpl, chsexpl, picture) VALUES 
		('$_POST[word]','$_POST[chara]','$_POST[interpretation]','$_POST[pronounction]','$_POST[difficulty]','$_POST[engexpl]','$_POST[chsexpl]','$_POST[picture]')";
	$retval = mysqli_query($conn, $sql);
	if(! $retval){
		die("create error" . mysqli_error($conn));
	}
}
else{
	echo "<script>alert('单词已存在！'); window.location.href='../addwords.html';</script>";
}
mysqli_close($conn);


?>


<script>
	conf = confirm('单词已写入词典中！')
	if(conf==true){
		window.location.href='../main.html';
	}
</script>
</body>
</html>