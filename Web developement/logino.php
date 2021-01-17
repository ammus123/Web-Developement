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
           	<li><a href="Regester.php"> Register</a></li>
             
           	
           	<li><a href="Profile1.php"> profile</a></li>
           	
           </ul>
		</div>

		
    
   
        <div class="filter"></div>
        <div class="container">
           <h1>Login</h1>
            <form method="post">
                <input type="text" name="t1" placeholder="email id"><br/>
    <input type="password" name="p1" placeholder="password"><br/>
    <input type="submit" name="b1" value="Log In" >
            </form>
        </div>
        
    </body>
    
</html>

<?php
session_start();
include("conn.php");
if(isset($_POST["b1"]))
{
  
  $un=$_POST['t1'];
  $pn=$_POST['p1'];
  
  $str="select * from users where email='$un' and password='$pn' limit 0,1";
  $res= mysqli_query($con,$str);
  //$count = mysqli_num_rows($res);
  $count =mysqli_fetch_array($res);
  if ($count >0)

 
  {
    setcookie('login',$un,time()+120);
   
    $_SESSION["id"] = $count['id'];
    $_SESSION["username"] = $count['username'];
    header("Location:index.php");  
    echo "sucess";
    //header("location:admin.php");
   
  }
 
  else
  {
    
    setcookie("login","1"); 
    echo "<script>  alert('Wrong password');
       </script>";
    header("location:logino.php");

    
        
  }
    
}
  ?>
		</div>
	</header>
</body>
</html>