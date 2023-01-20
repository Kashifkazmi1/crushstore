<?php
include('config.inc.php');
$pid = mysqli_real_escape_string($conn,$_POST['pid']);
$sql = "DELETE FROM `wishlist` WHERE `product_id` = '$pid'";
$res= mysqli_query($conn,$sql);
if($res){
    echo ("deleted sucessfuly");
}

?>