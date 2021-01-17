<?php
session_start();
?>

<?php
include("conn.php");




?>
<html>
<head>
<title>User Login</title>
</head>
<body>



<html>
<head>
	<meta charset="utf-8">
	<title>My first home page</title>
	<link rel="stylesheet" href="tr.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<body>
	<header>
		<div class="wrapper">
			<div class="logo">
				<img src="logo.jpg">
				
			</div>
			
           <ul class="nav-area">
           	<li><a href="Home.php"> home</a></li>
           
           	
           	 <li><a href="comments.php">Go to comment</a></li>


           	<?php
				if($_SESSION["username"]) {
				?>
				 
				<li><a href="logout.php" tite="Logout">Logout.</a></li>

				<?php
				}else echo "<script>  alert('Wrong password');
       </script>";
				?>
           	<li><a href="Profile1.php"> profile</a></li>
           	
           </ul> 
		</div>
<div class="welcome-text">
			
		<h1> Welcome  <?php echo $_SESSION["username"]; ?><h1>



</h1></div>


<form action="" method="POST">
	<input type="text" name="search" placeholder="search" style="width: 200px;height: 40px;" >
	<input type="submit" name="submit-search" value="click" style="width: 70px;height: 40px;"> </button> 
	

</form>


<?php

if(!isset($_COOKIE["login"]))
{// $_COOKIE is a variable and login is a cookie name 

	header("location:logino.php"); 
}

else
{



if (isset($_POST['submit-search']))
{
	
	
	if (!empty($_REQUEST['search']))

	{           
		        $search=$_POST['search'];
				$sql = "SELECT * FROM users WHERE username LIKE '%$search%'";
				$res= mysqli_query($con,$sql);
				$queryres = mysqli_num_rows($res);



			      echo '<table  cellspacing="2" cellpadding="2" border = 1px solid black> 
			      <tr td style="color:red"> 
			          <td style="color:white"> <font face="Arial">Name</font> </td> 
			          <td style="color:white"> <font face="Arial">Mailid</font> </td> 
			          
			      </tr>';

				if ($queryres > 0)
			{

				while ($row = mysqli_fetch_assoc($res))
				{
					
					$nm= $row['username'];
					$em = $row['email'];

				      echo '<tr> 
			                  <td style="color:white">'.$nm.'</td> 
			                  <td style="color:white">'.$em.'</td> 
			                  </tr>';
				}           
			}

				else
				{
					//echo "No user name Match found";
					echo"<script>  alert(' No username match found');
				       </script>";
				}
    }
else
	{
		echo"<script>  alert('Enter something');
       </script>";
	}

}
}





?>


</body>
</html>