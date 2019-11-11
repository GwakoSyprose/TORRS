<?php


if (isset($_SESSION['domain']) ) {
    if ($_SESSION['domain'] == 1){
        // echo "adm admin";
        
    }else{
        header("Location: pages/homepage.php?loggedIn=".$_SESSION['userID']);
    }
}else{

    // echo "log in first";
    header("Location: ../index.php");
}
?>