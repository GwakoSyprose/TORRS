<?php
    require('../pages/addnewdriver.php');

if(isset($_POST['submit'])){
    
    $file = $_FILES['profile'];
    
    $fileName = $FILES['profile']['name'];
    $fileTmpName = $FILES['profile']['tmp_  name'];
    $fileSize = $FILES['profile']['size'];
    $fileError = $FILES['profile']['error'];
    $fileType = $FILES['profile']['type'];
    
    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));
    
    $allowed= array('jpg', 'jpeg', 'png');
    
    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize< 2000000){
                //giving the image a unique name
                //$fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination= '../pages/images/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
            }else{
                echo "Your file is too big";
            }
            
        }else{
            echo "There was an error in uploading your file";
        }
        
        
    }else{
        echo "You cannot upload files of this type";
    }
}
        
?>
