<?php include 'server.php';
$servername="localhost";
$username="root";
$password="";
$dbname="login";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
	die("Nu s-a putut face conexiunea".mysqli_connect_error());
}
$sql="select * from produse";
$result=mysqli_query($conn,$sql);
if(empty($_SESSION['username']))
{
	header('location:index.php');
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<title>Pagina</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style2.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>

<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
  <a  href="pagina.php" class="w3-bar-item w3-button w3-padding-large w3-tomato">
    <i class="fa fa-database w3-xxlarge"></i>
    <p>Produse</p>
  </a>
  <a href="index.php?logout='1'" class="w3-bar-item w3-button w3-padding-large w3-tomato">
    <i class="fa fa-window-close w3-xxlarge"></i>
    <p>Logout</p>
  </a>
</nav>


<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<div class="w3-main">

	  <?php if(isset($_SESSION['username'])): ?>
	   <p class="welcome">Bun venit <strong><?php echo $_SESSION['username'];?></strong></p>
	   <?php endif ?>

 <div class="container">
        <form  method="post">
         <a href="editare.php" class="btn">Adauga reteta</a>
		 </form>
    <?php 
	if (mysqli_num_rows($result)>0):
	while($row=mysqli_fetch_assoc($result)): ?>
<div class="unu">
 <p>
 <?php 
 echo $row['nume'].'-'.$row['pret'].' lei';
 ?></p>
 <p>
 <?php
 echo $row['ingrediente'];
 ?></p>
 </div>
 <div id="bted">
 <a href="editare.php?editare=<?php echo $row['id'];?>" class="btn">Editeaza reteta</a>
 <a href="server.php?delete=<?php echo $row['nume'];?>" class="btn">Sterge reteta</a>
 </div>
       <?php endwhile; ?>
	   <?php endif; ?>
	   
</div>

<!-- END MAIN -->
</div>



<!-- END PAGE CONTENT -->
</div>

</body>
</html>
