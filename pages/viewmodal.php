<?php
session_start();
require_once('../includes/connection.php');
?>

<?php
$id= $_POST['id'];//getting the id
$id= (int)$id;   //type casting to interger
$sql= "SELECT * FROM drivers WHERE driverID='$id'";
$result= $link->query($sql);
$driver= mysqli_fetch_assoc($result);
?>

<!--Item details modal-->

<?php ob_start(); ?>
<!-- Central Modal Medium Warning -->
<div class="modal fade" id="centralModalWarning" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-warning" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <p class="heading lead">Modal Warning</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-5">
                        <?php
                                    
                                    echo "<img src='images/".$driver['profileImage']."' width=150 height=150>";
                                    
                                     ?>

                    </div>
                    <div class="col-sm-7">

                        <table class="table  table-borderless">


                            <tbody>
                                <tr>

                                    <td class="font-weight-bold">First Name</td>
                                    <td><?= $driver['dfname']; ?> <?= $driver['dlname']; ?></td>



                                </tr>

                                <tr>

                                    <td class="font-weight-bold">National ID</td>
                                    <td><?= $driver['driverID']; ?></td>

                                </tr>
                                <tr>

                                    <td class="font-weight-bold">License No</td>
                                    <td><?= $driver['licence']; ?></td>


                                </tr>
                            </tbody>
                            <div class="col-md-12" align="right">
                                <form method="post">

                                    <a type="submit" name="generate_pdf">Print Details</a>
                                </form>
                            </div>
                        </table>
                    </div>
                </div>
            </div>s

            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <a class="nav-link" href="recordoffence.php?pid=<?= $driver['driverID']; ?>" >
                    <button class="btn btn-sm  btn-outline-danger col text-center " >RECORD OFFENSE</button>
                </a>
                 <a class="nav-link">
                    <button class="btn btn-sm  btn-outline-info col text-center " data-dismiss="modal">CLOSE</button>
                </a>
             
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
 <script>

//ajax call,send JSON file
function recordOffence(id){
 var data={"id" : id};//setting object data and passing id 
 jQuery.ajax({
 	url: '/TORS/pages/recordoffence.php',
 	method: "post",
 	data: data,
 	success: function(data){
 		jQuery('body').append(data); //add html from detailsmodal page
 		jQuery ('#centralModalWarning').modal('toggle') //select details modal and open/toggle

 	},
 	error: function(){
 		alert("something went wrong!")
 	}
 });

}
</script>
