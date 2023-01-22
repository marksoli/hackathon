<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="/css/peepit.css" />
	<script src="/js/jquery-3.2.1.min.js"></script>
	<script src="/js/bootstrap.js"></script>
	<title>Password Change</title>
</head>
<body>
<div class="container">
	<ul>
	        <li><a href="/Default/index">Peepit</a></li>
	        <?php

	          echo "<li><a href=/Profile/displayProfile/".$_SESSION['user_id'].">My Profile</a></li>";
	          //$test = $model['profiles'];
	          echo "<li><a href=/Message/index/".$_SESSION['user_id']."> Messages </a></li>";
	        ?>
	        <li><a href="/Login/Logout">Logout</a></li>
        </ul>
	<h1>Change password</h1>
	<form action="" method="post">
		<table class="table">
			<tr><td><label for="oldPassword">Old Password:</label></td>
			<td><input type="password" name="oldPassword"/></td></tr>
			<tr><td><label for="newPassword">New Password:</label></td>
			<td><input type="password" name="newPassword"></td></tr>
			<div class="form-group">
			<tr><td><input type="submit" name="action" value="Change" /></td></tr>
			</div>
	</form>
</div>
</body></html>