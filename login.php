<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
	
<?php
	$un = filter_input(INPUT_POST, 'un') or die('Missing or illegal un parameter');	
	$pw = filter_input(INPUT_POST, 'pw') or die('Missing or illegal pw parameter');	
	
	
	require_once('dbcon.php');
	
//////////////////PREPARED STATEMENT TIL LOGIN//////////////////	
	$sql = 'SELECT id, pwhash FROM users WHERE username=?';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('s', $un);
	$stmt->execute();
	$stmt->bind_result($id, $pwhash);
	
	while ($stmt->fetch()){	}
	
	
///////////////////IF STATEMENT TIL LOGIN SIDEN////////////////////	
	if (password_verify($pw,$pwhash)){
		echo 'un an pw matched user with id:'.$id;
		$_SESSION ['users_id'] = $id;
		$_SESSION ['uname'] = $un;
	}
	else{
		echo 'Illegal username/password combination';
	}
	
?>
	
	<form action="logout.php" method="post">
		<button type="submit">Logout</button>
	</form>

<a href="postitboard.php">View the Post It board</a>
</body>
</html>