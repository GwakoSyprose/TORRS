<?php

require_once('../includes/connection.php');
include ('../includes/head.php');

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
                <h6 class="heading lead">Drivers Details</h6>

                <button type="button" class="close" onclick="javascript:window.location.reload()" data-dismiss="modal" aria-label="Close">
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
            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <a class="nav-link" href="recordoffence.php?pid=<?= $driver['driverID']; ?>" >
                    <button class="btn btn-sm  btn-outline-danger col text-center " >RECORD OFFENSE</button>
                </a>
                 <a class="nav-link">
                    <button class="btn btn-sm  btn-outline-info col text-center"  data-dismiss="modal" onclick="javascript:window.location.reload()">CLOSE</button>
                </a>
             
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<script>
$('#centralModalWarning').on('hidden', function () {
  document.location.reload();
})
</script>
