<?php require_once("../resources/config.php");?>



<?php
  session_start();
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    if(isset($_POST['addreview'])){
        $cid = $_SESSION['cid'];
        $review = $_POST["review"];
        $pid = $_POST["pid"];
        $query = "INSERT INTO `review`(`review`, `cid`, `pid`) VALUES ('$review','$cid','$pid')";
        $queryrun = mysqli_query($con , $query);
        header("location: product-page.php?pid=$pid");
    }
  }
  else{
    header("location: login.php");
  }

?>
