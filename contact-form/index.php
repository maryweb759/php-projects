<?php
$name = $email = $msg = ''; 
$nemerr = $emailerr = $msgerr = ''; 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    if (empty($_POST["fname"])) { 
        $nemerr = "name is required";
    } else { 
        $name = test_input($_POST["fname"]);
    } 
    if (empty($_POST["email"])) { 
        $emailerr = "email is required"; 
        }  else { 
       $email = test_input($_POST["email"]);
       $email = $_POST["email"];
    } 
    if (empty($_POST["message"])) { 
        $msgerr = "message is required";
    } else { 
       $msg = test_input($_POST["message"]);
    } 
 // if no error send the email mail(to, subject, message, headers)
 if (empty($nemerr) && empty($emailerr) && empty($msgerr)) { 
     
     
    if(mail("misk6760@gmail.com", "my subject", $msg)) { 
        $name = ''; 
        $email = ' '; 
        $msg = ''; 
        $success = "we have received your message";
    } else { 
        $failed = "please check your information again";
    }
   
  }
}

function test_input($data) { 
    $data = htmlspecialchars($data);
    $data = trim($data); 
    $data = stripslashes($data); 
    return $data;
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact us form</title> 
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="wrapper">
  <h2>Contact us</h2>
  <div id="error_message">
  <span class="success"> <?php if(isset($success)) { echo $success ; }  if(isset($failed)) { echo $failed  ;} ?> </span>
  
  </div>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="myform" method="post" > 
  
    <div class="input_field"> 
    <input type="text" placeholder="name" id="f-name" name="fname"  value="<?php echo isset($_POST["fname"])? $name : '' ; ?>"> 
    <span class="name-er"> <?php echo $nemerr ?></span>
        <div class="err-div">   <p class="nameerr  error">  name is required </p></div>
    </div>
    <div class="input_field">
        <input type="text" placeholder="Email" id="email" name="email" value="<?php echo isset($_POST["email"])? $email : '' ; ?>"  > 
        <span class="email-er"> <?php echo $emailerr ?></span>
        <div class="err-div"> <p class="emailerr  error">  email is required </p></div>
    </div> 
    <div class="input_field">
        <input type="text" placeholder="Subject" id="subject">
    </div>
    <div class="input_field">
    <label> message</label> <br>
        <textarea placeholder="Message" id="message" name="message" ><?php echo isset($_POST["message"])? $msg : ''  ?></textarea> 
        <span class="msg-er"> <?php echo $msgerr ?></span>
        <div class="err-div"> <p class="msgerr error">  message is required </p></div>
    </div>
    <div class="btn">
        <input type="submit" id="submit" value="contact">
    </div>
  </form>
</div> 
<script src="app.js"></script>
</body>
</html>