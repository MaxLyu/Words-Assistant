<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>单词助手</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	
</head>

<body>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid container">
		<div class="navbar-header">
			<a class="navbar-brand" href="main.html">单词助手</a>
		</div>
		<div class="float-right ">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="text.html">测试</a></li>
				<li class="active"><a href="addwords.html">录入词汇</a></li>
			</ul>
			
		</div>
	</nav>
	<div class="container">
		<table class="table table-hover">
		  <caption>生词本</caption>
		  <thead>
			<tr>
			  <th>word</th>
			  <th>词性</th>
			  <th>音标</th>
			  <th>中文</th>
			  <th>example</th>
			  <th>例句</th>
			  <th>难度</th>
			</tr>
		  </thead>
		  <tbody>
			<?php
				
				require_once("php/sqlconfig.php");
				$conn = mysqli_connect($host, $username, $password);

				if(! $conn){
					die("connect error: " . mysqli_error($conn));
				}
				mysqli_select_db( $conn, $dbname);
				$sql = "select * from note order by word";
				$result = mysqli_query($conn, $sql);
				while($row = mysqli_fetch_assoc($result)){
					echo '<tr>';
					echo '<td>' . $row["word"] . '</td>';
					echo '<td>' . $row["chara"] . '</td>';
					echo '<td>' . $row["pronounction"] . '</td>';
					echo '<td>' . $row["interpretation"] . '</td>';
					echo '<td>' . $row["engexpl"] . '</td>';
					echo '<td>' . $row["chsexpl"] . '</td>';
					echo '<td>' . $row["difficulty"] . '</td>';
				}
				mysqli_close($conn);
			?>
		  </tbody>
		</table>
	</div>
</body>
</html>