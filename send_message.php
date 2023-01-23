<?php 
include 'partials/config.php';
$name = mysqli_real_escape_string($conn,$_POST['name']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$subject = mysqli_real_escape_string($conn,$_POST['subject']);
$message = mysqli_real_escape_string($conn,$_POST['message']);
$added_on = date('Y-m-d h:i:s');
mysqli_query($conn,"INSERT INTO `contact_us` (`name`, `email`, `subject`, `message`, `added_on`) VALUES ('$name', '$email', '$subject', '$message', '$added_on')");

echo "Thank you";
?>