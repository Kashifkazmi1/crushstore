<?php 
include 'partials/config.inc.php';
$status = mysqli_real_escape_string($conn,$_POST['status']);


  $update_status = $_POST['update_status'];
  $res = mysqli_query($conn, "UPDATE `buy` SET `order_status` = '$update_status' WHERE `buy`.`id` = '$order_id'");
echo "Thank you";
?>