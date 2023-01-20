<?php

include 'partials/config.php';

$username = mysqli_real_escape_string($conn , $_POST["username"]);
$password = mysqli_real_escape_string($conn ,$_POST["password"]);


$data = "username=".$username;

  $sql = "Select * from user where `email` ='$username' ";
  
  $result = mysqli_query($conn , $sql);
  $num = mysqli_num_rows($result);
  
    

    // fetch data from data base 
    while($row = mysqli_fetch_assoc($result))
   


    // password verify 

      if(password_verify($password,$row['password'])){
        
           $login = true ;
           session_start();
           $_SESSION['loggedin'] = true;
           $_SESSION['username'] = $username ;
           $_SESSION['UID'] = $row['id'];
           if($username === "kashif"){
          header("location:admin/index.php");
             
           }else{
          header("location:shop.php");
         
           }
          exit;
            
 }else{
  
  echo " Password do not match " ;
}



?>