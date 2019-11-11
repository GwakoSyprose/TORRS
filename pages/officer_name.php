<?php
function getName($id){
    include  ('../includes/connection.php');
    $sql = "SELECT * FROM `users` WHERE userID ='$id';";
    $result = $link->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo 'Taken By '.$row["lname"]." ".$row["fname"];
        }
    } else {
       echo "";
    }
}


?>