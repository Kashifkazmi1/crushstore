<?php
 $userExist = false;
 $passDoNotMatch = false;
if($_SERVER["REQUEST_METHOD"]=="POST"){

// storing values in variable 
include 'partials/config.php';
$username = mysqli_real_escape_string($conn ,$_POST["username"]);
$email = mysqli_real_escape_string($conn ,$_POST["email"]);
$password = mysqli_real_escape_string($conn ,$_POST["password"]);
$cpassword = mysqli_real_escape_string($conn ,$_POST["cpassword"]);



//check wether this username is exist 
$existSql = "SELECT * FROM `user` WHERE `email` = '$email'";
$result = mysqli_query($conn,$existSql);
$numExistRows=mysqli_num_rows($result);
if($numExistRows> 0){
//  $exists = true ;
 $userExist = true ;
}
else{


if($password==$cpassword){
  $hash = password_hash($password, PASSWORD_DEFAULT);
 

//   insert data in data base 
              
          $sql = "INSERT INTO `user` (`username`, `password`, `email`) VALUES('$username', '$hash', '$email')"; 

          
        $result = mysqli_query($conn , $sql);
        
          if($result){
            $login = true ;
           session_start();
           $_SESSION['loggedin'] = true;
           $_SESSION['username'] = $username ;
           $_SESSION['UID'] = $row['user_id'];
           header('location:shop.php');
         
           }
          // else{
          //   echo " Password do not match ";
          //        }
            }else {
                $passDoNotMatch = true;

            }

         }

}
 



?>