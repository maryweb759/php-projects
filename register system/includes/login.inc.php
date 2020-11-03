<?php  
if (isset($_POST["submit"])) { 
    $username = $_POST["usersUid"]; 
    $pwd =  $_POST["pwd"]; 

    require_once "dbh.inc.php";
    require_once "functions.inc.php"; 

    if (emptyInputLogin($username, $pwd) !== false) { 
        header("location: ../login.php?error=emptyinput"); 
        exit() ;
    } 

    loginUser($conn, $username, $pwd); 
    header("location: ../index.php");
} 
else { 
    header("location: ../login.php");
    exit();
}
?>