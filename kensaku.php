<!DOCTYPE html>
<html>
<head>
	<title>PHP基礎</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
</head>
<body>

	<?php
	$code = $_POST['code'];

	$dsn = 'mysql:dbname=phpkiso;host=localhost;charset=utf8';
	$user = 'root';
	$password = 'root';
	$dbh = new PDO($dsn,$user,$password);

	$sql = 'SELECT * FROM anketo WHERE code=?';
	$stmt = $dbh -> prepare($sql);
	$data[] = $code;
	$stmt -> execute($data);

	while(1) {
		$rec = $stmt -> fetch (PDO::FETCH_ASSOC);
		if ($rec == false) {
			break;
		}
		print $rec['code'];
		print $rec['nickname'];
		print $rec['email'];
		print $rec['goiken'];
		print '<br>';
	}

	$dbh = null;
	?>
	<br>
	<a href="kensaku.html">検索画面に戻る</a>

</body>
</html>