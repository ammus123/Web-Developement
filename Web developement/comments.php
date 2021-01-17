<?php

 
if(!isset($_COOKIE["login"]))
  header("location:logino.php");


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
           	<li><a href="Home.php"> Home</a></li>
           
           	<li><a href="logout.php"> logout</a></li>
           	<li><a href="Profile1.php"> profile</a></li>
            <li><a href="index.php"> MY Home</a></li>
           	
           </ul> 
		</div>

		
    
   
        <div class="filter"></div>
        <div class="container">
           <h1>COMMENTS</h1>
            <form method="post" action="comment.php">
                


            <input id="name" name="name" placeholder="your name"><br>
           
           <textarea name="comment" cols="40" rows="10" placeholder="comment" 
    style="width: calc(100% - 20px);
    padding: 8px 10px;
    margin-bottom: 15px;
    border: none;
    background-color: transparent;
    border-bottom: 2px solid #2979ff;
    color: #fff;
    font-size: 20px;"></textarea><br>

          <input type="submit" name="submit" value="submit">
            </form>
        </div>


<?php
include("conn.php");


  $sql = "SELECT * FROM comments";
  $res= mysqli_query($con,$sql);
  $queryres = mysqli_num_rows($res);



echo '<table  cellspacing="10" cellpadding="10" border = "10" <table border="1" 
           align="bottom"  > 
           
      <tr td style="color:red"> 
          <td style="color:white"> <font face="Arial"><b><h3>Comments</h3><b></font> </td> 
         
      </tr>';

  if ($queryres > 0)
{

  while ($row = mysqli_fetch_assoc($res))
  {
    
    $nm= $row['name'];
    $em = $row['comments'];

        echo '<tr> 
                  <td style="color:white">'.$nm.'</td> 
                  <td style="color:white">'.$em.'</td> 
                  </tr>';
  }           
}

else
{
  echo "No user name Match found";
}


?>


        
    </body>
    
</html>