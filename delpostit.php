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

<a href="postitboard.php">View the PostIt board</a>
	
	
<?php 


	$postitid = filter_input (INPUT_POST, 'pid', FILTER_VALIDATE_INT) or die ('Missing or illegal pid paramenter');
	$userid = $_SESSION['users_id'];
	
	require_once('dbcon.php');
	
	if (intval($userid) === 8) {
		
		$mysqlstring = 'DELETE FROM postit WHERE id=?';
		$stmt = $link->prepare($mysqlstring);
		$stmt ->bind_param('i', $postitid);
	} else {
		$mysqlstring = 'DELETE FROM postit WHERE id=? AND users_id=?';
		$stmt = $link->prepare($mysqlstring);
		$stmt ->bind_param('ii', $postitid, $userid);
	}
		$stmt ->execute();
///////////////PREPARED STATEMENT TIL AT SLETTE POST IT'S ////////////

	echo 'Deleted '.$stmt->affected_rows.'new rows in the table';
	
?>	
	
	
</body>
</html>