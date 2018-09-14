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
	
//////////////Henter eksterne variabler/////////////
	
	$un = filter_input(INPUT_POST, 'un') or die('Missing or illegal un parameter');	
	$pw = filter_input(INPUT_POST, 'pw') or die('Missing or illegal pw parameter');	
	$pwhash = password_hash($pw, PASSWORD_DEFAULT);
	
	
	require_once('dbcon.php');
	
//////////////Prepared statement til oprettelse af bruger/////////////
	$sql = 'INSERT INTO users (username, pwhash) VALUES (?, ?)';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('ss', $un, $pwhash);
	$stmt->execute();

	if($stmt->affected_rows > 0){
		echo 'User '.$un.' created';
	}
	else{
		echo 'Could not create user - username '.$un.' already exists';
	}
	
?>

<!----------- Videre til postit boardet-------->
<a href="postitboard.php">View the Post It board</a>
</body>
</html>