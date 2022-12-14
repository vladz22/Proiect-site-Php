<?php include 'server.php';?>
<!DOCTYPE html>
<html>
<head>
  <title>Login page</title>
  <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
   <div id="form">
     <form  method="POST">
	  <p>
	     <label>Username:</label>
		 <input type="text" maxlength="100" name="username" placeholder="Username"/>
	  </p>
	  <p>
	     <label id="pass">Parola:</label>
		 <input type="password" maxlength="50" name="password" placeholder="Password"/>
	  </p>
	  <p>
		 <button type="submit" class="btn" name="login">Login</button>
		 <p>
		     Nu ai cont? <a href="register.php">Register</a>
		 </p>
	  </p>
	  </form>
	  
		 </div>
</body>
</html>