<?php require_once("../resources/config.php"); ?>
<?php require_once("requirelogin.php"); ?>

<?php  

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $name = $_POST["name"];
        $cid = $_SESSION['cid'];
    }
    $sql = "UPDATE `customer` SET `cname`='$name' WHERE `cid`= '$cid' ";
    $result = mysqli_query($con, $sql);
    header("location: profile.php");

?>




