<?php  include_once "header.php" ;?>
<div class="container"> 
<h2 class="text-center">login</h2>
<form   action="includes/login.inc.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">user name / email</label>
    <input type="text" class="form-control" id="user" aria-describedby="userName" placeholder="user"  name="usersUid">
  </div>
  
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="Password1" placeholder="Password"  name="pwd">
  </div>
 
  
  <button type="submit" class="btn btn-primary" name="submit">login</button> 
  <a href="reset-password.php" type="button"> forget password</a>
</form> 

<?php  
  if (isset($_GET["success"])) { 
    if ($_GET["success"] == "changePwd") {
      echo "<p> password has changed </p>";
     }
  }
   if (isset($_GET["error"])) {
     if ($_GET["error"] == "emptyinput") {
      echo "<p> fill all fields </p>";
     } 
     else if ($_GET["error"] == "wronglogin") {
      echo "<p> incorrect name ! </p>";
     } 
     else if ($_GET["error"] == "wrongloginpwd") {
      echo "<p> incorrect  password! </p>";
     } 
     
   }

 ?>

</div>
<?php  include_once 'footer.php' ;?>


