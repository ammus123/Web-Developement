<?php
session_start();
$id = $_SESSION["id"];
if ($id <=0)
{
  
  echo"<script>  alert('Login first');
       </script>";
       header("Location:logino.php");

}


?>
<html>
<head>
	<meta charset="utf-8">
	<title>My first home page</title>
	<link rel="stylesheet" href="comment.css">
	<link rel="stylesheet" type="text/css" href="commet2.css">
</head>
<body>
	<header>
		<div class="wrapper">
			<div class="logo">
				
			</div>
			
           <ul class="nav-area">
           	<li><a href="Home.php"> home</a></li>
           
           	<li><a href="logout.php"> logout</a></li>
           	<li><a href="index.php"> my home</a></li>
           	<li><a href="comments.php"> Comments</a></li>
           </ul> 
		</div>

		
    
   
        <div class="filter"></div>
        <div class="container">
           <h1>Update</h1>
            <form method="post" action="">
                


            <input id="text" name="username" placeholder="Name"><br>
            <input type="text" name="email" placeholder="email id"><br>
          <input type="Password" name="password" placeholder="password"><br>
          <input type="Password" name="password1" placeholder="Confirm password"><br>

          <input type="submit" name="submit" value="submit">
          <input type="submit" name="view" value="view">

            </form>
        </div>


<?php
include("conn.php");
//session_start();

if(isset($_POST["view"]))
{
$id=$_SESSION["id"];


  $sql = "SELECT * FROM users where id ='$id'";
  $res= mysqli_query($con,$sql);
  $queryres = mysqli_num_rows($res);



echo '<table  cellspacing="10" cellpadding="10" border = "10" <table border="1" 
           align="bottom"  > 
           <tr><td style="color:white"> <font face="Arial"><b><h3>Details</h3><b></font> </td><tr>
      <tr td style="color:red"> 
          <td style="color:white"> <font face="Arial"><b><h3>Name</h3><b></font> </td> 
         <td style="color:white"> <font face="Arial"><b><h3>email</h3><b></font> </td>
         <td style="color:white"> <font face="Arial"><b><h3>Password</h3><b></font> </td>
      </tr>';

  if ($queryres > 0)
{

  while ($row = mysqli_fetch_assoc($res))
  {
    
    $nm= $row['username'];
    $em = $row['email'];
    $pas=$row['password'];

        echo '<tr> 
                  <td style="color:white">'.$nm.'</td> 
                  <td style="color:white">'.$em.'</td> 
                  <td style="color:white">'.$pas.'</td> 
                  </tr>';
  }           
}

else
{
  echo "No user name Match found";
}
  

  $sql="UPDATE users SET  email = 'avani@gmail.com'
                      WHERE id = '$id'";
  mysqli_query($con,$sql);
}

if(isset($_POST["submit"]))
{
  $username=$_POST['username'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $cpassword=$_POST['password1'];

  if($password==$cpassword)
  {
  
  
//$con=mysqli_connect("localhost","root","") or die("connection error");
//$dbl=mysqli_select_db($con,"mias")or die("database not selected");
      $sql="UPDATE users SET username = '$username', email = '$email', password = '$password'
                      WHERE id = '$id'";
      if(mysqli_query($con,$sql))
      {
       echo ('sucess');
       header("Location:register.php");
      }
      else
      {
        echo ('fail');
      }
    }

  else
  {
    
    echo('Password dont match');
    echo"<script>  alert('Password dont match');
       </script>";
    
  }
}







?>


        
    </body>
    
</html>