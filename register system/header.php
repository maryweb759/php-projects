<?php  
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
    <link rel="stylesheet" href="css/reset.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li> 
      <?php  
      
        if (isset($_SESSION["userid"])) { 
          echo "
           <li class='nav-item'>
            <a class='nav-link' href='profile.php'>portofolio</a>
          </li>"; 
         echo "
         <li class='nav-item'>
         <a class='nav-link' href='includes/logout.inc.php'>logout</a>
       </li>
         ";
        } 
        else { 
          echo "
          <li class='nav-item'>
           <a class='nav-link' href='signup.php'>signup</a>
         </li>"; 
        echo "
        <li class='nav-item'>
        <a class='nav-link' href='login.php'>login</a>
      </li>
        ";
        } ?>
     
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
  </div>
</nav>