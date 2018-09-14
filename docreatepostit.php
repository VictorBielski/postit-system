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

/////////////// HENTER EKSTERNE INFORMATIONER/////////////
$headertext = filter_input(INPUT_POST, 'headertext') or die('Missing headertext parameter');	
$bodytext = filter_input(INPUT_POST, 'bodytext') or die('Missing bodytext parameter');	
$colorid = filter_input(INPUT_POST, 'colorid') or die('Missing colorid parameter');	
$userid = $_SESSION['users_id'];
	
	require_once('dbcon.php');
	
////////////// PREPARED STATEMENT TIL OPRETTELSE AF EN NY POSTIT/////////////
	$sql = 'INSERT INTO postit (headertext, bodytext, color_id1, users_id) VALUES (?, ?, ?, ?)';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('ssii', $headertext, $bodytext, $colorid, $userid);
	$stmt->execute();
	
	echo 'Inserted '.$stmt->affected_rows.' new rows in the table';
	
?>

<a href="postitboard.php">View the Post It board</a>
	
</body>
</html>