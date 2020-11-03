<?php 
 if ($_SERVER['REQUEST_METHOD'] == 'POST') :
    // setting errors 
    $errors = array();  
    // setting database image name
 $all_image = array();
$uploaded_files = $_FILES['my_work'];

$image_name = $uploaded_files['name'];
$image_type = $uploaded_files['type']; 
$image_temp = $uploaded_files['tmp_name']; 
$image_size = $uploaded_files['size']; 
$image_error =$uploaded_files['error']; 
$allowed_extension = array('jpg', 'gif', 'jpeg', 'png');
// check if file is uploaded
if ($image_error[0] == 4): 
 echo '<div> no file uploaded </div>';
else: // there is files uploaded
    $file_count = count($image_name); 
    for ($i = 0; $i < $file_count; $i++ ) {
        //echo $image_name[$i]; 
    
        $errors = array();  
        // get file extension 
        $fileNameCmps = explode(".",   $image_name[$i]);
       // $image_extension[$i] = strtolower(end(explode('.', $image_name[$i])));
        $image_extension[$i] = strtolower(end( $fileNameCmps));
        
        // get random name for image 
        $image_random[$i] = rand(1, 10000000000000000) . '.' . $image_extension[$i];
        // check file size
        if ($image_size[$i] > 100000): 
            $errors[] = '<div> file can not be more than x </div>';
        endif;
        if (! in_array($image_extension[$i], $allowed_extension)): 
            $errors[] = '<div> file is not valid </div>';
        endif;
        if (empty($errors)): 
        move_uploaded_file($image_temp[$i] ,  $_SERVER['DOCUMENT_ROOT'].  '\php_course\signUp form\up\\' . $image_random[$i]); // remove image from the temporary path to the new path - it takes 2 paramtre
        // success message
        echo '<div style="background-color:red; padding:10px;  margin-bottom:10px;" >';
        echo '<div> file number '. ($i + 1) . ' uploaded </div>';
        echo '<div> file name : '. $image_name[$i] . '</div>';
        echo '<div> new name : '. $image_random[$i] . '</div>';
        echo '</div>';
        $all_image[] = $image_random[$i];
        else: 
            echo '<div style="background-color:red; padding:10px; margin-bottom:10px;" >';
            echo 'error for file number '. ($i + 1) ;
            echo 'file name : '. $image_name[$i];
            // loop through errors
            foreach($errors as $error): 
                echo $error;
            endforeach;
            echo '</div>';
    endif;
       
    }
    
endif;
 $image_field = implode(' , ', $all_image );
 echo $image_field;
endif;
// a function to get the current url when working in aserver
echo realpath(dirname(getcwd()));




?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data" > 
      <input type="file" name="my_work[]" multiple="multiple" id=""> 
      <input type="submit" value="send">
    </form>
</body>
</html>