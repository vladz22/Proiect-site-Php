<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname="login";
$nume='';
$pret='';
$ingrediente='';
$id=0;
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
	die("Nu s-a putut face conexiunea".mysqli_connect_error());
}
if(isset($_POST['login']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	$sql="select * from users where username='".$username."' AND password='".$password."' limit 1";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			$_SESSION['username']=$username;
			$_SESSION['succes']="Esti logat";
			header("Location:pagina.php");
			
		}
		
	}
	else
	{
	 
		echo '<p class="invalid">Cont invalid </p>';
		
	}
}
if(isset($_POST['register']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sql2="select username from users where username='".$username."'limit 1";
	$result=mysqli_query($conn,$sql2);
	$sql="INSERT INTO users(username,password) VALUES('".$username."','".$password."')";
if(mysqli_num_rows($result)==1)
	 {
		while($row=mysqli_fetch_assoc($result))
		{
			echo '<p class="invalid">Deja exista acest cont</p>';
		}
	  }
else
	{
		if(mysqli_query($conn,$sql))
	    {
		echo '<p class="invalid">Contul a fost creat</p>';
	     }
	    else
	    {
		die ('<p>Contul nu s-a putut crea</p>:');
	    }
    }
}

if(isset($_GET['logout']))
{
	session_destroy();
	unset($_SESSION['username']);
	header('location:index.php');
}
 if(isset($_GET['delete']))
 {
	 $nume=$_GET['delete'];
	 $sql="delete from produse where nume='".$nume."'";
	 if (mysqli_query($conn, $sql)) 
	 {
	 header('location:pagina.php');
      } 
     else 
	 {
    echo "A aparut o eroare " . mysqli_error($conn);
      }

 }
 if(isset($_GET['editare']))
{
	$id=$_GET['editare'];
	$sql2="select * from produse where id=$id";
	$result=mysqli_query($conn,$sql2);
	if(mysqli_num_rows($result)==1) 
	{
     $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	 $id=$row['id'];
	 $nume=$row['nume'];
	 $pret=$row['pret'];
	 $ingrediente=$row['ingrediente'];
    } 
}
 
mysqli_close($conn);
?>