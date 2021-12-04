<?php require_once("../resources/config.php");?>

<?php

    if (isset($_GET['pid'])){
    // $sid = $_SESSION['sid'];
    $oid = $_GET["oid"];
    $pid = $_GET["pid"];

    // $query1 = "INSERT INTO `sellerorders`(`sid`, `oid`, `pid`) VALUES ('$sid', '$oid', '$pid')";
    // $queryrun1 = mysqli_query($con , $query1);

    $sql = "UPDATE `orderhistory` SET `status`= 2 WHERE `orderid`= '$oid' AND `pid` = '$pid'";
    $result = mysqli_query($con, $sql);

    header("location:myorders.php");
    
    }
    

?>