<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">

<title>Create Post It</title>
	
<style>
	* {
		margin: 0;
		padding: 0;
	}
	
	
	#container {
		text-align: center;
		display: flex;
		flex-wrap: wrap;
		width: 100%;
		height: 100%;
		align-content: center;
		margin: auto;
		margin-top: 3%;
	}
	
	input {
		width: 100%;
		height: 30%;
		font-family: 'Indie Flower', cursive;
		background: transparent;
		border: none;
		font-size: 80px;
		text-align: center;
		color: white;
		font-weight: bold;
		
	}
	
	input::placeholder {
		font-size: px;80
		font-family: 'Indie Flower', cursive;
		color: white;
		font-weight: bold;
	}
	
	textarea {
		background: transparent;
		border: none;
		width: 100%;
		font-family: 'Indie Flower', cursive;
		font-size: 20px;
		text-align: center;
		height: 100%;
		margin-top: 1%;
		height: 130px;
		resize: none;
		
	}
	
	textarea::placeholder {
		font-family: 'Indie Flower', cursive;
		font-size: 20px;
		text-align: center;
		color: black;
	}
	
	
	#createpostit {
		margin: 20px;
		width: 450px;
		height: 450px;
		background: linear-gradient(132deg, #FF4454, #FF3443);
		padding: 15px;
		border-bottom-right-radius: 190px 7px;
		transform: rotate(-3deg);
		box-shadow: 2px 3px 5px -4px black;
		font-family: 'Indie Flower', cursive;
		cursor: move;
		font-weight: bold;
		margin-left: 37%;
	}
	
	.forfatternavn {
		text-align: left;
		font-weight: bold;
		font-size: 15px;
	}
	.forfatternavn::placeholder {
		font-size: 15px;
	}
	
	select {
		font-family: 'Indie Flower', cursive;
		font-weight: bold;
		font-size: 50px;
		background: transparent;
		border: none;
		margin-top: 65px;
		color: white;
		float: left;
		margin-left: 15px;
	}
	
	button {
   		border: none;
    	color: black;
    	padding: 15px 32px;
    	text-align: center;
    	text-decoration: none;
    	display: inline-block;
    	font-size: 22px;
    	margin: 4px 2px;
    	cursor: pointer;
    	-webkit-transition-duration: 0.4s; /* Safari */
    	transition-duration: 0.4s;
		font-family: 'Indie Flower', cursive;
		margin: 65px 0 0 120px;
	}
	
	button:hover {
		box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
		font-size: 25px;
	}
	
	h1 {
		text-align: center;
		font-family: 'Indie Flower', cursive;
		margin-top: 2%;
		font-size: 60px;
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
	</style>
	
	
	
</head>

<body>
	
	
<!------------------- Form til at lave sin post it ------------------------------>
	<h1>Create a new Post It !</h1>
	
	<div id="container">
	<div id="createpostit">
	<form action="docreatepostit.php" method="post">
		<input type="text" name="headertext" placeholder="Header"><br>
		<textarea name="bodytext" placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis eligendi saepe. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis eligendi saepe."></textarea>
		<select name="colorid" required>
						
<!------------------- Prepared stmt til valg af farve (Den kan bruges flere gange)----------------------------->		
<?php
			require_once('dbcon.php');
			$sql = 'SELECT id, colorname FROM color';
			$stmt = $link->prepare($sql);
			$stmt->execute();
			$stmt->bind_result($cid, $cnam);
			while($stmt->fetch()){
				echo '<option value="'.$cid.'">'.$cnam.'</option>'.PHP_EOL;
			}
?>
		</select>
		
<!------------------- Create knap til at "create" sin post it note ------------------------------>		
		<button type="submit">Create</button>
	</form>
	</div>	
</div>		
</body>
</html>