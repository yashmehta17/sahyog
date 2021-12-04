
<?php require_once("../resources/config.php");?>

<?php

  session_start();
  if(isset($_POST['addques'])){
      $cid = $_SESSION['cid'];
      $question = $_POST["question"];
      $query = "INSERT INTO `faq`(`question`, `cid`) VALUES ('$question','$cid')";
      $queryrun = mysqli_query($con , $query);
      header("location: faq.php");
  }


?>
