<?php
include('connection.php');
$sql="SELECT * FROM types";
$pquery=$link->query($sql);
?>
<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
    <div class="main-navbar">
        <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
            <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                <div class="d-table m-auto">
                    <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;"
                        src="images/shards-dashboards-logo.svg" alt="Shards Dashboard">
                    <span class="d-none d-md-inline ml-1">Traffic Offenders System</span>
                </div>
            </a>
            <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
            </a>
        </nav>
    </div>
    <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
        <div class="input-group input-group-seamless ml-3">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            <input class="navbar-search form-control" type="text" placeholder="Search for something..."
                aria-label="Search">
        </div>
    </form>
    <div class="nav-wrapper" style="background-color:#262626;">
        <ul class="nav flex-column" style="border: none;">
            <li class="nav-item text-center " style="background-color: transparent;">
                <a class="nav-link text-white" href="homepage.php">

                    <h6 style="color:#ffff;">DASHBOARD</h6>

                </a>
            </li>
            <?php while($type=mysqli_fetch_assoc($pquery)): 
              $typeID=$type['typeID'];
?>

            <li class="nav-item" style="background-color: transparent;">
                <a class="nav-link " style="border-bottom: 0px;" href="tables.php?typeid=<?php echo $typeID; ?>">

                    <button class="btn btn-light col text-center"><?php echo $type['typeName'];?>S</button>
                </a>
            </li>

            <?php endwhile; ?>
            <li class="nav-item" style="background-color: transparent;">
                <a class="nav-link" href="incidences.php">

                    <button class="btn btn-secondary col text-center">INCIDENCES</button>
                </a>
            </li>
            


        </ul>
    </div>
</aside>