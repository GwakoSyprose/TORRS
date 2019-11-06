<div class="main-navbar sticky-top bg-white">
            <!-- Main Navbar -->
            <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
              <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                <div class="input-group input-group-seamless ml-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      
                    </div>
                  </div>
                  <input class="navbar-search form-control" type="text" placeholder=" " aria-label="Search"> </div>
              </form>
              <ul class="navbar-nav border-left flex-row ">
                <li class="nav-item border-right dropdown notifications">
                  <a class="nav-link nav-link-icon text-center dropdown-toggle"  href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="nav-link-icon__wrapper">
                      <i class="material-icons">&#xE7F4;</i>
                      <span class="badge badge-pill badge-danger count"></span>
                    </div>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small not-menu" aria-labelledby="dropdownMenuLink">
                   
                  
                    <a class="dropdown-item notification__all text-center" href="#"> View all Notifications </a> 
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle mr-2" src="images/cop.png" alt="User Avatar">
                    <span class="d-none d-md-inline-block" style="text-transform: uppercase;">
                      <?= $_SESSION['fname'] ?> <?= $_SESSION['lname'] ?></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item" href="userprofile.php">
                      <i class="material-icons">&#xE7FD;</i> Profile</a>
                    <a class="dropdown-item" href="components-blog-posts.html">
                      <i class="material-icons">vertical_split</i> Blog Posts</a>
                    <a class="dropdown-item" href="add-new-post.html">
                      <i class="material-icons">note_add</i> Add New Post</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="../logout.php">
                      <i class="material-icons text-danger">&#xE879;</i>Logout</a>
                  </div>
                </li>
              </ul>
              <nav class="nav">
                <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                  <i class="material-icons">&#xE5D2;</i>
                </a>
              </nav>
            </nav>
          </div>