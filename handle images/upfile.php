<?php
/*
 if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $fileNameCmps = explode(".",  $_FILES['image']['name']);
    $file_ext=strtolower(end($fileNameCmps));
    
    $extensions= array("jpeg","jpg","png");
    
    if(in_array($file_ext,$extensions)=== false){
       $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    
    if($file_size > 2097152) {
       $errors[]='File size must be excately 2 MB';
    }
    
    if(empty($errors)==true) {
       move_uploaded_file($file_tmp,  $_SERVER['DOCUMENT_ROOT'].  '\php_course\signUp form\up\\' .$file_name);
       echo "Success";
    }else{
       print_r($errors);
    }
 } */ 
  
   //  '\php_course\signUp form\up\\' .  $fille_name);
    if ($_SERVER['REQUEST_METHOD'] === 'POST')  { 
       $errors = array(); 
       $file_name = $_FILES['image']['name']; 
       $file_size = $_FILES['image']['size']; 
       $file_tmp = $_FILES['image']['tmp_name']; 
       $file_type = $_FILES['image']['type']; 
       $file_error = $_FILES['image']['error'];
       $fileNameCmps = explode('.',  $file_name); 
       $file_ext = strtolower(end($fileNameCmps)); 
       $extensions = array('png', 'jpg', 'jpeg');
       if ($file_error === 4) { 
         $errors[] = "select a file first";
       } else { 
          if(in_array($file_ext,  $extensions) === false) { 
            $errors[] = "extension is not allowed";
          }
          if ( $file_size > 100000) { 
            $errors[] = "size is not allowed";
          }
       } 
       if(empty($errors) === true) { 
          move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT']. '\php_course\signUp form\up\\'. $file_name ); 
          echo 'success';
       } else { 
          foreach($errors as $error): 
            echo  $error; 
          endforeach;
       }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data"   > 
     <input type="file" name="image" id=""> 
     <input type="submit" value="send">
    </form>
</body>
</html>