<?php


// storing values in variable 
include 'partials/config.php';
$username = mysqli_real_escape_string($conn ,$_POST["username"]);
$email = mysqli_real_escape_string($conn ,$_POST["email"]);
$password = mysqli_real_escape_string($conn ,$_POST["password"]);




//check wether this username is exist 
$existSql = "SELECT * FROM `user` WHERE `email` = '$email'";
$result = mysqli_query($conn,$existSql);
$numExistRows=mysqli_num_rows($result);
if($numExistRows> 0){
echo("username already exist");
}
else{
 $hash = password_hash($password, PASSWORD_DEFAULT);
 $sql = "INSERT INTO `user` (`username`, `password`, `email`) VALUES('$username', '$hash', '$email')"; 
 $result = mysqli_query($conn , $sql);

  if ($result) {
    $login = true;
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    

  }
            }

         


 
