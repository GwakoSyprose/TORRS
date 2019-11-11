<body class="h-100">


    <div class="container-fluid">
        <div class="row">

            <main class="main-content col-lg-12">
                


                <div class="main-content-container container-fluid  px-4">
                    <!-- Page Header -->
                    <div class="page-header row no-gutters py-4">
                        <div class="col-12 col-sm-4 text mb-0">
                            <span class="text-uppercase page-subtitle">Overview</span>
                            <h3 class="page-title">Driver Registration</h3>
                        </div>
                        <?php echo $error; ?>
                    </div>
                    <!-- End Page Header -->
                    <!-- Default Light Table -->
                    <div class="row">

                        <div class="col-lg-10 offset-md-1">
                            <div class="card card-small mb-4">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">Account Details</h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item p-3">
                                        <div class="row">
                                            <div class="col">
                                                                                       <form role="form" method="POST">

                                            <div class="form-group">
                                                <label for="comment"><b>Select an offense</b></label><br>

                                                <select name="offense[]" class="custom-select" multiple="multiple">
                                                    <?php include 'offence_types.php'; ?>
                                                </select>
                                            </div>

                                            <!-- Initialize the plugin: -->
                                            <script type="text/javascript">
                                                $(document).ready(function() {
                                                    $('.custom-select').multiselect();
                                                });

                                            </script>

                                            <div class="form-group">
                                                <label for="comment"><b>Number Plate</b></label>
                                                <input type="text" class="form-control" placeholder="KAP-506Z" name="numplate">
                                            </div>
                                            <script type="text/javascript">
                                                $(document).ready(function() {



                                                    $("#numplate").inputmask("aaa-999a"); //static mask

                                                });

                                            </script>

                                            <div class="form-group">
                                                <label for="comment"><b>Offence Description:</b></label>
                                                <textarea class="form-control" rows="5" name="description"></textarea>
                                            </div>
                                            <input type="submit" class="btn btn-block" name="submit" value="submit">

                                        </form>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Default Light Table -->
                </div>

                <?php 
    include $_SERVER['DOCUMENT_ROOT'] . '/TORS/includes/footer.php'; 
   
    ?>