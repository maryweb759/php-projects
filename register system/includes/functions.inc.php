<?php 

function emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat) { 
    $result ; 
    if (empty($name) || empty($email) || empty($pwd) || empty($pwdrepeat) ) { 
        $result = true; 
    } else { 
        $result = false;
    } 
  return $result ;
} 
/** 
function invalidName($name) { 
    $result; 
    if (!preg_match("/^[a-zA-Z-0-9]*$/" , $name)) { 
        $result = true; 
    } else { 
        $result = false;
    } 
    return $result ;     

} */
function invalidUid($username) { 
  $result; 
  if (!preg_match("/^[a-zA-Z-0-9]*$/" , $username)) { 
      $result = true; 
  } else { 
      $result = false;
  } 
  return $result ;     

}
function invalidEmail($email) { 
    $result; 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
        $result = true; 
    } else { 
        $result = false;
    } 
    return $result ;     

} 
function pwdMatch($pwd, $pwdrepeat) { 
    $result; 
    if ($pwd !== $pwdrepeat) { 
        $result = true; 
    } else { 
        $result = false;
    } 
    return $result ;     

} 
function nameExists($conn, $username, $email) { 
   $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail= ?;"; 
 // write the prepared statement to make sure it runs into the database without any inputs from the user
  $stmt = mysqli_stmt_init($conn); 
  if (!mysqli_stmt_prepare($stmt, $sql)) { // check if prepare styt will fail
    header("location: ..\signup.php?error=stmtfailed"); 
    exit() ;
  } 

  mysqli_stmt_bind_param($stmt, "ss", $username, $email); // take or submit data from the user
  mysqli_stmt_execute($stmt); // esecute
  $resultData = mysqli_stmt_get_result($stmt); 
  if ($row = mysqli_fetch_assoc($resultData)) { 
     return $row;
  } else { 
    $result = false;
    return $result ;  
  }
  mysqli_stmt_close($stmt);
} 

function createUser($conn, $name, $username, $email, $pwd) { 
    $sql = " INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);"; 
  // write the prepared statement to make sure it runs into the database without any inputs from the user
   $stmt = mysqli_stmt_init($conn); 
   if (!mysqli_stmt_prepare($stmt, $sql)) { 
     header("location: ..\signup.php?error=stmtfailed"); 
     exit() ;
   } 
   $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
   mysqli_stmt_bind_param($stmt, "ssss", $name, $email,  $username, $hashedPwd); 
   mysqli_stmt_execute($stmt); 
   mysqli_stmt_close($stmt);
   header("location: ..\index.php?error=none"); 
   exit() ;
 } 

// login system
 function emptyInputLogin($username, $pwd) { 
  $result ; 
  if (empty($username) || empty($pwd) ) { 
      $result = true; 
  } else { 
      $result = false;
  } 
return $result ;
} 


function loginUser($conn, $username, $pwd) { 
  $nameExists = nameExists($conn, $username, $username); 
  if ($nameExists == false) { 
    header("location: ../login.php?error=wronglogin"); 
    exit();
  } 
  $pwdhashed = $nameExists["usersPwd"]; 
  $checkPwd = password_verify($pwd, $pwdhashed); // verify is the password matches

  if ($checkPwd == false) { 
    header("location: ../login.php?error=wrongloginpwd"); 
    exit();
  }
  else if ($checkPwd == true) {
    session_start(); 
    $_SESSION["userid"] = $nameExists["usersId"]; 
    $_SESSION["username"] =$nameExists["userName"]; 
    header("location: ../index.php"); 
    exit();
  } 

} 