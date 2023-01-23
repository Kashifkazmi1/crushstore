<?php

include 'partials/config.php';

$username = mysqli_real_escape_string($conn , $_POST["username"]);
$password = mysqli_real_escape_string($conn ,$_POST["password"]);


  $sql = "Select * from user where `email` ='$username' ";
  
  $result = mysqli_query($conn , $sql);
  $num = mysqli_num_rows($result);

  if ($num == 0) {
  echo ("Username not exist");
  }

    // fetch data from data base 
    while($row = mysqli_fetch_assoc($result))
   


    // password verify 

      if(password_verify($password,$row['password'])){
        
           $login = true ;
           session_start();
           $_SESSION['loggedin'] = true;
           $_SESSION['username'] = $username ;
           $_SESSION['UID'] = $row['id'];
           if ($username == "admin@love.you") {
      header("admin/index.php");
           }
          exit;
            
 }else{
  
  echo " Password do not match " ;
}


?>