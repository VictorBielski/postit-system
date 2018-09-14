<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">	
<title>Untitled Document</title>
	
<style>
	
	html{
		background: url(blackboard.png) no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
		
	}
	
	fieldset {
		display: inline-block;
		 border: 3px solid white;
	}
	
	form {
		width: 45%;
	}
	
	legend {
		font-size: 35px;
		font-family: 'Indie Flower', cursive;
		font-weight: bolder;
		color: white;
	}
	
	#container {
		text-align: center;
		display: flex;
		flex-wrap: wrap;
		align-content: center;
		margin: 0 auto;
		margin-top: 8%;
		width: 65%;
		width: 60%;
	}
	
	input {
		width: 100%;
   		padding: 12px 20px;
    	margin: 8px 0;
    	display: inline-block;
    	border: 1px solid #ccc;
    	border-radius: 4px;
    	box-sizing: border-box;
		height: 50px;
	}
	
	
	button {
		border: 1px solid black;
		border-radius: 3px;
    	color: black;
    	padding: 15px 32px;
    	text-align: center;
    	text-decoration: none;
    	display: inline-block;
    	font-size: 10px;
    	margin: 4px 2px;
    	cursor: pointer;
    	-webkit-transition-duration: 0.4s; /* Safari */
    	transition-duration: 0.4s;
		font-family: 'Indie Flower', cursive;
		font-weight: bold;
		font-size: 15px;
	}
	
	button:hover {
		box-shadow: 0 5px 5px 0 rgba(0,0,0,0.24),0 5px 25px 0 rgba(0,0,0,0.19);
		font-size: 15px;
	}
	
	hr {
		height: 280px;
		width: 1px;
		color: black;
		background-color: white;
	}
	
	h1 {
		text-align: center;
		font-size: 80px;
		font-family: 'Indie Flower', cursive;
		color: white;
	}
	
</style>
</head>

<body>	
	
<h1>Create user or Login</h1>		
	
<div id="container">
<form action="createuser.php" method="post">
	<fieldset>
		<legend>Create User</legend>
		<input type="text" name="un" placeholder="Username" required>
		<input type="password" name="pw" placeholder="Password" required><br><br>
		<button type="submit">Create User</button>
	</fieldset>
</form>
	
<hr>
	
<form action="login.php" method="post">
	<fieldset>
		<legend>Login</legend>
		<input type="text" name="un" placeholder="Username" required>
		<input type="password" name="pw" placeholder="Password" required><br><br>
		<button type="submit">Login</button>
	</fieldset>
</form>	
	
</div>
	
</body>
</html>