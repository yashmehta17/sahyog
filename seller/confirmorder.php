<?php require_once("../resources/config.php");?>

<?php

    session_start();
    if (isset($_POST['pid'])){
    $sid = $_SESSION['sid'];
    $oid = $_POST["orderid"];
    $pid = $_POST["pid"];

    $query1 = "INSERT INTO `sellerorders`(`sid`, `oid`, `pid`) VALUES ('$sid', '$oid', '$pid')";
    $queryrun1 = mysqli_query($con , $query1);

    $sql = "UPDATE `orderhistory` SET `status`= 1 WHERE `orderid`= '$oid' AND `pid` = '$pid'";
    $result = mysqli_query($con, $sql);

    header("location:myorders.php");
    
    }
    

?>