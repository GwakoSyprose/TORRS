<?php
include  ('../includes/connection.php');
    
    $typeid= $_GET['typeid'];
    $queryactive=mysqli_query($link, "SELECT * FROM drivers WHERE typeID= '$typeid' AND  status=0  ");
    $querysus=mysqli_query($link, "SELECT * FROM drivers WHERE typeID= '$typeid' AND   status=1 ");
   
?>


<?php include '../includes/head.php'; ?>

<body class="h-100">

    <div class="container-fluid">
        <div class="row">
            <!-- Main Sidebar -->
            <?php include '../includes/sidenav.php'; ?>
            <!-- End Main Sidebar -->
            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                <?php include '../includes/navbar.php'; ?>
                <!-- / .main-navbar -->
                <div class="main-content-container container-fluid px-4">
                    <!-- Page Header -->
                    <div class="page-header row no-gutters py-4">
                        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                            <span class="text-uppercase page-subtitle">Overview</span>
                            <h6 class="page-title">
                            <?php 
                            if($typeid==1){
                                echo "PSV";
                            }elseif($typeid==2){
                                echo "PERSONAL VEHICLES";
                            }elseif($typeid==3){
                                echo "ORGANIZATIONS";
                            }elseif($typeid==4){
                                echo "MOTORCYCLES";
                            }elseif($typeid==5){
                                echo "TRUCKS";
                            }?> 
                            </h6>

                        </div>
                    </div>
                    <!-- Navigation tabs -->

                    <ul class="nav nav-tabs" id="activeTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="activeTab" data-toggle="tab" href="#active" role="tab"
                                aria-controls="home" aria-selected="true">Active</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="suspendedTab" data-toggle="tab" href="#suspended" role="tab"
                                aria-controls="profile" aria-selected="false">Suspended</a>
                        </li>

                    </ul>

                    <div class="tab-content">

                        <!-- active drivers -->
                        <div id="active" class="container tab-pane active">
                            <!-- Default Light Table -->
                            <div class="row" id="activeTable">



                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2" id="active_drivers">
                                        <thead>
                                            <tr>

                                                <th>Driver ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Licence No</th>
                                                <th>Offence Count</th>
                                                <th>Registration Date</th>
                                                <th>Actions</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                    while($result = mysqli_fetch_assoc($queryactive)) :
                            $id=$result['driverID'];
                            $dfname=$result['dfname'];
                            $dlname=$result['dlname'];
                            $licence=$result['licence'];
                            $status=$result['status'];
                            $count=$result['offenceCount'];
                            $date=$result['regDate'];
                        ?>
                                            
                                             <tr class="tr-shadow" data-toggle="modal" data-target="#centralModalWarning" onclick="detailsmodal(<?=$result['driverID']; ?>)" >
                                                
                                                <td id="id"><?php echo $id; ?></td>
                                                <td id="name"><?php echo $dfname; ?></td>

                                                <td id="name"><?php echo $dlname; ?></td>
                                                <td id="license"><?php echo $licence ?></td>

                                                <td id="count"><?php echo $count ?> </td>

                                                <td id="date"><?php echo $date ?> </td>

                                                <td>
                                                    <span class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Send">
                                                            <i class="zmdi zmdi-mail-send"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="More">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </button>
                                                    </span>
                                                </td>
                                                <?php endwhile; ?>

                                            </tr>



                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <!-- End Default Light Table -->
                        </div>

                        <div id="suspended" class="tab-pane fade">
                            <!-- Default Dark Table -->
                            <div class="row" id="suspendedTable">

                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2" id="sus_drivers">
                                        <thead>
                                            <tr>

                                                <th>Driver ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Licence No</th>
                                                <th>Offence Count</th>
                                              <th>Registration Date</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                    while($result = mysqli_fetch_assoc($querysus)) :
                            $id=$result['driverID'];
                            $dfname=$result['dfname'];
                            $dlname=$result['dlname'];
                            $licence=$result['licence'];
                            $status=$result['status'];
                            $count=$result['offenceCount'];
                            $date=$result['regDate'];
                        ?>
                                            <tr class="spacer"></tr>
                                            <tr class="tr-shadow" data-toggle="modal" data-target="#centralModalWarning" onclick="detailsmodal(<?=$result['driverID']; ?>)" >

                                                <td id="id"><?php echo $id; ?></td>
                                                <td id="name"><?php echo $dfname; ?></td>

                                                <td id="name"><?php echo $dlname; ?></td>
                                                <td id="license"><?php echo $licence ?></td>

                                                <td id="count"><?php echo $count ?> </td>

                                                <td id="date"><?php echo $date ?> </td>

                                                <td>
                                                    <span class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Send">
                                                            <i class="zmdi zmdi-mail-send"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="More">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </button>
                                                    </span>
                                                </td>
                                                <?php endwhile; ?>

                                            </tr>



                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- End Default Dark Table -->


                        </div>

                        <!-- End Page Header -->


                    </div>
                    
                    <script>

//ajax call,send JSON file
function detailsmodal(id){
 var data={"id" : id};//setting object data and passing id 
 jQuery.ajax({
 	url: '/TORS/pages/viewmodal.php',
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
                    <script type="text/javascript">
                    $(document).ready(function() {
                        $('#active_drivers').DataTable();
                        $('#sus_drivers').DataTable();

                    });
                    </script>


                    <script>
                    jQuery(document).ready(function($) {
                        $('*[data-href]').on('click', function() {
                            window.location = $(this).data("href");
                        });
                    });
                    </script>
                    <?php 
    include '../includes/footer.php'; 
   
    ?>