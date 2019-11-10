<?php include ('../includes/head.php');

      include ('../includes/connection.php');

    $queryofficer=mysqli_query($link, "SELECT * FROM users WHERE domain = 1");
    // sql query statement that selects all registered users

  //Delete category
if (isset($_GET['delete']) && !empty($_GET['delete'])) {
  $delete_id=(int)$_GET['delete'];
  $sql="DELETE FROM users WHERE userID='$delete_id'";
  $link->query($sql);
  header('Location: adminhome.php');

}
   

?>


<body class="h-100">



    <div class="container-fluid">
        <div class="row">

            <?php include ('../includes/adminsidenav.php'); ?>

            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">


                <?php include ('../includes/navbar.php');?>
                <div class="main-content-container container-fluid px-4">
                    <div class="page-header row no-gutters py-4">
                        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                            <span class="text-uppercase page-subtitle">Overview</span>
                            <h3 class="page-title">Registered Officers</h3>
                        </div>
                    </div>
                    <!-- End Page Header -->
                    <!-- Default Light Table -->


                    <div class="row">
                        <div class="col">
                            <div class="card card-small mb-4">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">Current Users</h6>
                                </div>
                                <div class="card-body p-0 pb-3 text-center">


                                    <table class="table mb-0" id="drivers">
                                        <thead class="bg-light">
                                            <tr>

                                                <th scope="col" class="border-0">National ID</th>
                                                <th scope="col" class="border-0">First Name</th>
                                                <th scope="col" class="border-0">Second Name</th>
                                                <th scope="col" class="border-0">Rank</th>
                                                <th scope="col" class="border-0">Joined</th>
                                                


                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                    while($result = mysqli_fetch_assoc($queryofficer)) :
                            $nid=$result['userID'];
                            $fname=$result['fname'];
                            $lname=$result['lname'];                
                            $rank=$result['rank'];
                            $joined=$result['joined'];
                            
                
                        ?>

                                            <tr>
                                                <td id="id"><?php echo $nid; ?></td>
                                                <td id="name"><?php echo $fname; ?></td>
                                                <td id="name"><?php echo $lname; ?></td>
                                                <td id="license"><?php echo $rank ?></td>
                                                <td id="type"><?php echo $joined?></td>
                                               
                                                <td><a  id="<?= $result['userID']; ?>" class="btn btn-xs btn-danger delete"><span class="glyphicon glyphicon-trash "> Delete </span></a></td>

                                            </tr>


                                            <?php endwhile; ?>



                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Default Light Table -->

                    <!-- End Default Dark Table -->
                </div>
                <script type="text/javascript">
 $(document).ready(function(){  

   $('.delete').click(function(){
    var el = this;
    var id = this.id;
    var opt = "delete";
    $.confirm({
      title: 'Confirm Action',
      content: 'Are You Sure You want To Delete ?',
      type: 'red',
      typeAnimated: true,
      buttons: {
        Yes: {
          text: 'Yes',
          btnClass: 'btn-red',
          action: function(){
                // AJAX Request
                $.ajax({
                 url: 'adminhome.php',
                 type: 'GET',
                 data: {delete:id,dc:opt },
                 success: function(response){
                  console.log(response);
              // Removing row from HTML Table
              $(el).closest('tr').css('background','tomato');
              $(el).closest('tr').fadeOut(800, function(){ 
               $(this).remove();
             });

            }
          });
              }
            },
            No: function () {
            }
          }
        });


  });

 });
</script>

                <?php 
    include '../includes/footer.php'; 
   
    ?>
