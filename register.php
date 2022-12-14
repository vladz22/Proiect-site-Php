<?php include 'server.php';?>

<!DOCTYPE html>
<html>
<head>
  <title>Register page</title>
  <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
   <div id="form">
     <form  method="Post">
	  <p>
	     <label>Username:</label>
		<input type="text" maxlength="100" name="username" placeholder="Username"/>
	  </p>
	  <p>
	     <label id="pass">Parola:</label>
		<input type="password" maxlength="50" name="password" placeholder="Password"/>
	  </p>
	  <p>
		  <button type="submit" class="btn" name="register">Register</button>
		  <a href="index.php" class="btn">Inapoi</a>
	  </p>
	  </form>
		 </div>
</body>
</html>