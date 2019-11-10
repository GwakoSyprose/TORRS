<?php
include('connection.php');
session_start();
$region = $_SESSION['region'];
if(isset($_POST['view'])){
// $con = mysqli_connect("localhost", "root", "", "notif");
if($_POST["view"] != '')
{
   $update_query = "UPDATE notifications SET status = 1 WHERE status=0 && region= '$region'";
   mysqli_query($link, $update_query);
}
$query = "SELECT * FROM notifications WHERE region= '$region' ORDER BY notificationID DESC LIMIT 5";
$result = mysqli_query($link, $query);
$output = '';
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result))
{
  $output .= '
    <a class="dropdown-item" href="notifications.php">
                      <div class="notification__icon-wrapper">
                        <div class="notification__icon">
                          <i class="material-icons">announcement</i>
                        </div>
                      </div>
                      <div class="notification__content">
                        <span class="notification__category text-danger">'.$row["numPlate"].'</span>
                        <p>'.$row["description"].'</p>
                        <p>'.$row["phone"].'</p>
                      </div>
                    </a>
                   
  ';
 
}

}
else{
    $output .= '<a class="dropdown-item" href="notifications.php">
                      <div class="notification__icon-wrapper">
                        <div class="notification__icon">
                          <i class="material-icons">announcement</i>
                        </div>
                      </div>
                      <div class="notification__content">
                        <span class="notification__category text-danger">None</span>
                        <p>No new notification</p>
                        
                      </div>
                    </a>
                   
  ';
}
$status_query = "SELECT * FROM notifications WHERE status=0";
$result_query = mysqli_query($link, $status_query);
$count = mysqli_num_rows($result_query);
$data = array(
   'notification' => $output,
   'unseen_notification'  => $count
);
echo json_encode($data);
}
?>