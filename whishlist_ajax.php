<?php
session_start();
include 'partials/config.php';
$pid = mysqli_real_escape_string($conn,$_POST['pid']);
if (isset($_SESSION['loggedin'])) {
    $user_id = $_SESSION['UID'];

    $check = mysqli_query($conn,"SELECT * FROM `wishlist` WHERE user_id = '$user_id' and product_id = '$pid'");
    if (mysqli_num_rows($check)>0) {
        echo ("product alredy added");
    } else {

        $sql = "INSERT INTO `wishlist` (`user_id`, `product_id`, `added_on`) VALUES ('$user_id', '$pid', current_timestamp())";
        $res = mysqli_query($conn, $sql);
        if ($res) {
            echo ("product added to Wishlist");
        }
    }
}else{
    echo("please login");
}

?>