<?php require_once("../resources/config.php"); ?>
<?php require_once("requirelogin.php"); ?>

<?php  
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $phone = $_POST["phn"];
        $cid = $_SESSION['cid'];
        echo $phone;
    }
    $sql = "UPDATE `customer` SET `cphonenumber`='$phone' WHERE `cid`= '$cid' ";
    $result = mysqli_query($con, $sql);
    header("location: profile.php");

?>




