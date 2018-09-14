<?php
session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Post It board</title>
<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">	
	
<style>
	
	* {
		margin: 0;
		padding: 0;
	}
	
	html, body {
		background-color: white;
		width: 100%;
		height: 100%;
	}
	
	h1 {
		font-size: 45px;
		font-family: 'Indie Flower', cursive;
		text-align: center;
		margin-top: 2%;
		color: black;
	}
	
	h2 {
		font-size: 60px;
		font-family: 'Indie Flower', cursive;
		text-align: center;
		margin-top: 15%;
		color: white;
	}
	
	#container {
		text-align: center;
		display: flex;
		flex-wrap: wrap;
		height: 100%;
		align-content: center;
		margin: auto;
		width: 80%;
		background-color: white;
		float: right;
	}

		.postit {
		margin: 20px;
		width: 300px;
		height: 300px;
		background: linear-gradient(132deg, #FF4454, #FF3443);
		padding: 15px;
		border-bottom-right-radius: 190px 7px;
		transform: rotate(-3deg);
		box-shadow: 2px 3px 5px -4px black;
		font-family: 'Indie Flower', cursive;
		cursor: move;
	}
		
	#createknap {
		font-family: 'Indie Flower', cursive;
		text-decoration: none;
		font-weight: bold;
		font-size: 22px;
		cursor: pointer;
    	-webkit-transition-duration: 0.4s; /* Safari */
    	transition-duration: 0.4s;
		padding: 3px;
		align-content: center;
		text-align: center;
		margin: 40% 25% 0 25%;
		background-color: transparent;
		border: 2px solid white;
	}
	
	button:hover {
		box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
		font-size: 23px;
	}
	
	button a:link, a:visited {
		text-decoration: none;
		color: white;
	}
	
	.postitred {
		background: linear-gradient(132deg, #FF4454, #FF3443);
	}
	
	.postityellow {
		background: linear-gradient(132deg, #F8ec97, #f5e572);
	}
	
	.postitgreen {
		background: linear-gradient(132deg, #63FF5B, #2BFF1E);
	}
	.slet {
		float: right;
	}
	
	.vertical-menu {
    width: 100%;
	margin-top: 30%;

	float: left;
}

.vertical-menu a {
    display: block;
    padding: 12px;
    text-decoration: none;
	text-align: center;
	font-family: 'Indie Flower', serif;
	font-size: 30px;
}

.vertical-menu a:hover {
	font-size: 35px;
	transition: all .2s ease-in-out;
	transform: scale(1.1);
}

.vertical-menu a.active {
	text-decoration: underline;
}
	
	#postitcon {
		width: 100%;
		height: 100%;
	}	
	
	#verticalcon {
	width: 20%;
	height: 100%;
	float: left;
	background-color: #2A2A2A;
	}
	
	.username {
		float: right;
		margin-top: 55%;
	}
	
	@media only and screen (min-width: 1281px) {
  
		#createknap {
			
		}
  
}
</style>
	
	
</head>

	
	
<body>
	

	
	
<div id="postitcon">
<div id="container">	
<?php
require_once('dbcon.php');
$sql = 'SELECT postit.id AS pid, date(createdate), headertext, bodytext, users_id AS uid, username, cssclass 
FROM postit, users, color 
WHERE users_id = users.id AND color_id1 = color.id';
	
	$stmt = $link->prepare($sql);
	$stmt->execute();
	$stmt->bind_result($pid, $createdate, $htext, $btext, $uid, $username, $cssclass);
	
	while($stmt->fetch()){ ?>
	<div class="<?=$cssclass?> postit">
	
		
		<?php if (isset($_SESSION['users_id']) AND $_SESSION['users_id'] == $uid OR $_SESSION['users_id'] === 8) { ?>
		<form action="delpostit.php" method="post">
		<input type="hidden" name="pid" value="<?=$pid?>">
		<input class="slet" type="image" src="x.png" alt="Submit"/>
			
		</form>
		
		<?php } else { ?>
		
	<?php } ?>
		
		<time><?=$createdate?></time>
		<h1><?=$htext?></h1>
		<p><?=$btext?></p>
		<p class="username"><?=$username?></p>
	</div>	
<?php	
	}
?>
	

		
</div>
<div id="verticalcon">
<h2>Post It!</h2>
<div class="vertical-menu">
	<ul>
  	<li><a href="postitboard.php" class="active">Post It Board</a></li>
	<li><a href="index.php">Create User</a></li>
		<li>	
				<?php
					if (isset($_SESSION['users_id'])){ ?>	
						<a href="logout.php" name="cmd" value="logout">Logout</a>
				<?php } else { ?>
						<a href="index.php">Login</a>
				<?php } ?>
		</li>
</ul>
</div>
	<button id="createknap"><a href="createpostit.php" type="submit">Create new Post It!</button>
</div>
</div>
</body>
</html>