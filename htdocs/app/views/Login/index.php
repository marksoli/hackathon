<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="/css/peepit.css" />
	<script src="/js/jquery-3.2.1.min.js"></script>
	<script src="/js/bootstrap.js"></script>
	<title>Login</title>
</head>
<body class = "backgroundColor">
<div class="container">

	<?php
		if(isset($model['error'])){
			echo "<div class='alert alert-danger'> $model[error] </div>";
		}
	?>

	<h1 class = "animatedText">SpendWiser</h1>
	<h2 class="text-center" style="font-style: italic">Spend less, Make more</h2>
	<div class = "loginContainer">
	<h2>Login</h2>

	<form action="" method="post" class="form-horizontal">
	<div class="form-group">
		<label for="username">UserName:</label>
		<input type="text" class="spacing" name="username" id="username" />
	</div>
	<div class="form-group">
		<label for="password">Password:</label>
		<input type="password" class="spacing" name="password" id="password" />
	</div>
	<div class="form-group">
		<input type="submit" name="action" value="Login" /> 
		<a class="aButton" href="/Login/Register">Register</a>
	</div>
	</form>
	</div>
</div>
</body></html>