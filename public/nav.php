
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
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
              echo '<a href="logout.php" class="text-uppercase">Log Out</a>
                <ul class="custom-menu">
                  <li><a href="profile.php"><i class="fa fa-user-circle-o"></i>Profile</a></li>
                  <li><a href="orderhistory.php"><i class="fa fa-history"></i>Order History</a></li>
                  <li><a href="faq.php"><i class="fa fa-question-circle"></i>FAQ</a></li>
                </ul>
                ';
            }
            else{
              echo '<a href="login.php" class="text-uppercase">Login/SignUp</a>
              <ul class="custom-menu">
                <li><a href="login.php"><i class="fa fa-unlock-alt"></i> Login</a></li>
                <li><a href="signup.php"><i class="fa fa-user-plus"></i> Create An Account</a></li>
                <li><a href="../seller/blank.php"><i class="fa fa-unlock-alt"></i> Seller Login</a></li>
              </ul>';
            }
            ?>

          </li>
          <!-- /Account -->

          <!-- Cart -->
          <?php
          if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
          $cartid = $_SESSION['cid'];
          $sql = "SELECT * FROM `cart` WHERE cartid = '$cartid' ";
          $result = mysqli_query($con, $sql);
					$num = mysqli_num_rows($result);
          echo '
          <li class="header-cart dropdown default-dropdown">
            <a href="cart.php">
              <div class="header-btns-icon">
                <i class="fa fa-shopping-cart"></i>
              </div>
              <strong class="text-uppercase">My Cart:</strong>
              <br>
              <span>'.$num.' Items</span>
            </a>
          </li>';
          }
          ?>
          <!-- /Cart -->

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
  <div class="container" style="margin-left: 600px;">
    <div id="responsive-nav">
      <!-- menu nav -->
      <div class="menu-nav">
        <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
        <ul class="menu-list">
          <li><a href="index.php">Home</a></li>
          <li class="dropdown mega-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Category <i class="fa fa-caret-down"></i></a>
            <div class="custom-menu" style="min-width: 150px !important;" >
              <div class="row">
                <div class="col-sm-12" >
                  <ul class="list-links">
                    <?php
                        $sql = "SELECT * FROM `category`";
                        $result = mysqli_query($con , $sql);
                        while($row = mysqli_fetch_assoc($result)){
                          $categoryname = $row['categoryname'];
                          echo '<li><a href="products.php?cid='.$row['categoryid'].'">'.$categoryname.'</a></li>';
                        }
                    ?>
                  </ul>
                  <hr class="hidden-md hidden-lg">
                </div>
              </div>
            </div>
          </li>
          <li><a href="products.php">Products</a></li>
          <?php
          if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
            echo '<li><a href="cart.php">Cart</a></li>';
          }
          else{
            echo '<li><a href="login.php">Cart</a></li>';
          }
          ?>
        </ul>
      </div>
      <!-- menu nav -->
    </div>
  </div>
  <!-- /container -->
</div>
<!-- /NAVIGATION -->
