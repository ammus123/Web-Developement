<?php



?>
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
           
           	<li><a href="logino.php"> login</a></li>
           	<li><a href="register.php"> profile</a></li>
           	
           </ul> 
		</div>

		
    
   
        <div class="filter"></div>
        <div class="container">
           <h1>Register</h1>
            <form method="post">
                


            <input id="text" name="username" placeholder="Name"><br>
            <input type="text" name="email" placeholder="email id"><br>
          <input type="Password" name="password" placeholder="password"><br>
          <input type="Password" name="password1" placeholder="Conform password"><br>

          <input type="submit" name="submit" value="submit">
            </form>
        </div>
        
    </body>
    
</html>
<?php
include("conn.php");
if(isset($_POST["submit"]))
{
  $username=$_POST['username'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $cpassword=$_POST['password1'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  //$emailErr = "Invalid email format";
  echo"<script>  alert('Invalid email format');
       </script>";
       // header("Location:Register.php");
}


else
{

  if($password==$cpassword)
  {
  
  
//$con=mysqli_connect("localhost","root","") or die("connection error");
//$dbl=mysqli_select_db($con,"mias")or die("database not selected");
      $sql="insert into users(username,email,password) values('$username','$email','$password')";
      if(mysqli_query($con,$sql))
      {
        header("Location:logino.php");
      }
      else
      {
        echo"sql error";
      }
    }

  else
  {
    
    echo('Password dont match');
    echo"<script>  alert('Password dont match');
       </script>";
    
  }
}
}
?>
</body>
</html>