
<!-- HEADER -->
<header>
  <!-- header -->
  <div id="header">
    <div class="container">
      <div class="pull-left">
        <!-- Logo -->
        <div class="header-logo">
          <a class="logo" href="index.php">
            <img src="./img/logo.png" alt="">
            <!-- <h1>Sahyog- Covid19 Resource Helper</h1> -->
          </a>
        </div>
        <!-- /Logo -->
      </div>
      <div class="pull-right">
        <ul class="header-btns">
          <!-- Account -->
          <li class="header-account dropdown default-dropdown">
            <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
              <div class="header-btns-icon">
                <i class="fa fa-user-o"></i>
              </div>
              <strong class="text-uppercase">My Account <i class="fa fa-caret-down"></i></strong>
            </div>
            <?php
            session_start();
            if(isset($_SESSION['sloggedin']) && $_SESSION['sloggedin']==true){
              echo '<a href="logout.php" class="text-uppercase">Log Out</a>';
            }
            else{
              echo '<a href="login.php" class="text-uppercase">Login/SignUp</a>
              <ul class="custom-menu">
                <li><a href="../public/login.php"><i class="fa fa-unlock-alt"></i>Customer Login</a></li>
                <li><a href="signup.php"><i class="fa fa-user-plus"></i> Create Seller Account</a></li>
              </ul>';
            }
            ?>

          </li>
          <!-- /Account -->

          

          <!-- Mobile nav toggle-->
          <li class="nav-toggle">
            <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
          </li>
          <!-- / Mobile nav toggle -->
        </ul>
      </div>
    </div>
    <!-- header -->
  </div>
  <!-- container -->
</header>
<!-- /HEADER -->

<!-- NAVIGATION -->
<div id="navigation">
  <!-- container -->
  <div class="container" style="margin-left: 700px;">
    <div id="responsive-nav">
      <!-- menu nav -->
      <div class="menu-nav">
        <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
        <ul class="menu-list">
          <li><a href="index.php">Home</a></li>
          
          <li><a href="myorders.php">My Orders</a></li>
          
        </ul>
      </div>
      <!-- menu nav -->
    </div>
  </div>
  <!-- /container -->
</div>
<!-- /NAVIGATION -->
