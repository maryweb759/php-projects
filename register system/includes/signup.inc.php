<?php 
if (isset($_POST["submit"])) { 
   $name = $_POST["name"];
   $email = $_POST["email"];
   $username = $_POST["uid"];
   $pwd = $_POST["pwd"];
   $pwdrepeat = $_POST["pwdrepeat"];
   
   require "dbh.inc.php"; 
   require_once "functions.inc.php";

if (emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat) !== false) { 
    header("location: ..\signup.php?error=emptyinput"); 
    exit() ; // stops the script from running
}

if (invalidUid($username) !== false) { // if it is !== false there is an error
    header("location: ..\signup.php?error=invalidUid"); 
    exit() ;
}
if (invalidEmail($email) !== false) { 
    header("location: ..\signup.php?error=invalidEmail"); 
    exit() ;
} 
if (pwdMatch($pwd, $pwdrepeat) !== false) { 
    header("location: ..\signup.php?error=pwdMatch"); 
    exit() ;
} 

if (nameExists($conn, $username, $email) !== false) { 
    header("location: ..\signup.php?error=usernameTaken"); 
    exit() ;
} 

createUser($conn, $name,$username, $email, $pwd);

} else { 
    session_start();
    $_SESSION["loggedin"] = true;
    $_SESSION["id"] = $id;
    header("location: ..\signup.php");  
    exit();
}