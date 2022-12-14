<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="login";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
	die("Nu s-a putut face conexiunea".mysqli_connect_error());
}
$sql3="select * from produse";
$result2=mysqli_query($conn,$sql3);
if (mysqli_num_rows($result2)>0)
{
	while($row=mysqli_fetch_assoc($result2))
	{
		echo '<div class="unu">
 <p>'.$row['nume'].'-'.$row['pret'].'lei</p>'.$row['ingrediente'].'</p>
 </div>';
	}
}
mysqli_close($conn);
?>