<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- <link rel="stylesheet" type="text/css" href="/css/spendwiser.css" /> -->
	<link rel="stylesheet" type="text/css" href="/css/style.css" />
	<title>Login</title>
</head>
<div class="sidenav">
         <div class="login-main-text">
            <h2>SpendWiser<br></h2>
            <h3>Get richer.</h3>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form action="" method="post">
                  <div class="form-group">
                     <label>User Name</label>
                     <input type="text" name="username" id="username" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" name="password" id="password" class="form-control" required>
                  </div>
                  <button type="submit" name="action" value="Login" class="btn btn-black">Login</button>
                  <a href="/Login/Register" class="btn btn-secondary">Register</a>
               </form>
            </div>
         </div>
      </div>
      <?php
			if(isset($model['error'])){
				echo "<div class='alert alert-danger'> $model[error] </div>";
			}
		?>
</html>
