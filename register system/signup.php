<?php  include('header.php') ;?>
<div class="container">
<form   action="includes/signup.inc.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">name</label>
    <input type="text" class="form-control" id="user" aria-describedby="userName" placeholder="Enter name"  name="name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" class="form-control" id="Email1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">name</label>
    <input type="text" class="form-control" id="user" aria-describedby="userName" placeholder="Enter name"  name="uid">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="Password1" placeholder="Password"  name="pwd">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"> repeat Password</label>
    <input type="password" class="form-control" id="Password2" placeholder="Password"  name="pwdrepeat">
  </div>
  
  <button type="submit" class="btn btn-primary" name="submit">sign up</button>
</form> 

 <?php  
   if (isset($_GET["error"])) {
     if ($_GET["error"] == "emptyinput") {
      echo "<p> fill all fields </p>";
     } 
     else if ($_GET["error"] == "invalidUid") {
      echo "<p> choose a propre name </p>";
     } 
     else if ($_GET["error"] == "invalidEmail") {
      echo "<p> choose a propre email </p>";
     } 
     else if ($_GET["error"] == "pwdMatch") {
      echo "<p> password does not match </p>";
     } 
     else if ($_GET["error"] == "usernameTaken") {
      echo "<p> username taken </p>";
     }  
     else if ($_GET["error"] == "none") {
      echo "<p>you have signed up </p>";
     }  
     else if ($_GET["error"] == "stmtfailed") { 
      echo "<p> something went wrong </p>";
     }
   }

 ?>

</div>
<?php  include_once 'footer.php' ;?>


