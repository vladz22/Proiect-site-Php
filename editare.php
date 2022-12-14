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

if(isset($_POST['adaugare']))
{
	$nume=$_POST['nume'];
	$pret=$_POST['pret'];
	$ingrediente=$_POST['ingrediente'];
	$sql="select nume from produse where nume='".$nume."'limit 1";
	$result=mysqli_query($conn,$sql);
	$sql2="INSERT INTO produse(nume,pret,ingrediente) VALUES('".$nume."','".$pret."','".$ingrediente."')";
if(mysqli_num_rows($result)>0)
	 {
		while($row=mysqli_fetch_assoc($result))
		{
			echo '<p class="invalid2">Deja exista produs cu acest nume</p>';
		}
	  }
else
	{
		if(mysqli_query($conn,$sql2))
	    {
		echo '<p class="invalid2">Produsul a fost creat</p>';
	     }
	    else
	    {
		die ('<p>Contul nu s-a putut crea</p>:');
	    }
    }
}
if(isset($_POST['update']))
{
	$id=$_POST['id'];
	$nume=$_POST['nume'];
	$pret=$_POST['pret'];
	$ingrediente=$_POST['ingrediente'];
	$sql2="update produse set nume='".$nume."',pret='".$pret."',ingrediente='".$ingrediente."' where id='".$id."'";
	if (mysqli_query($conn, $sql2)) 
	{
  echo '<p class="invalid2">Produsul a fost editat</p>';
   } 
  else 
{
  echo "Error updating record: " . mysqli_error($conn);
}
}
if(empty($_SESSION['username']))
{
	header('location:index.php');
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<title>Editare/Adaugare</title>
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

	  <?php if(isset($_SESSION["username"])): ?>
	   <p class="welcome">Bun venit <strong><?php echo $_SESSION['username'];?></strong></p>
	   <?php endif ?>

<div id="form2">
     <form  method="post">
	  <input type="hidden" name="id" value="<?php echo $id;?>">
	  <p>
	     <label>Nume:</label>
		 <input type="text" maxlength="100" name="nume" value="<?php echo $nume;?>" placeholder="Nume"/>
	  </p>
	  <p>
	     <label id="text">Pret:</label>
		 <input type="text" maxlength="50" name="pret" value="<?php echo $pret;?>" placeholder="Pret"/>
	  </p>
	  <p>
	     <label>Ingrediente:</label>
		 <br>
		  <input  type="text" name="ingrediente" value="<?php echo $ingrediente;?>" style="width:300px;height:50px;">
	  </p>
	  <p>
		 <button type="submit" class="btn" name="update">Editeaza</button>
		 <button type="submit" class="btn" name="adaugare">Adauga</button>
		 <a href="pagina.php" class="btn">Inapoi</a>
	  </p>
	  </form>
 </div>
</div>

<!-- END MAIN -->
</div>




<!-- END PAGE CONTENT -->
</div>

</body>
</html>
