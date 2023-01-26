
<?php
session_start();
if($_SESSION['loggedin'] != true && $_SESSION['username'] != "kashif"){
	header('location:/crushstore.php/index.php');
}
?>
<?php include('partials/config.inc.php');
 include('partials/function.inc.php');

 $categories_name = '';
 $msg = '';
 if(isset($_GET['id'])&& $_GET['id'] != ''){
    $id = get_safe_value($conn,$_GET['id']);
    $sql = "SELECT * FROM `categories` where `id` = $id";
    $res = mysqli_query($conn , $sql);
    $row = mysqli_fetch_assoc($res);
    $categories_name = $row['category_name'];
   }

if(isset($_POST['submit'])){
    $categories = get_safe_value($conn,$_POST['categories']);
    $sql = "SELECT * FROM `categories` where `category_name` = '$categories'";
    $res = mysqli_query($conn , $sql);
    $row = mysqli_fetch_assoc($res);
    if ($row > 0) {
       $msg = "category already exist ";
    }else{
      $sql = "INSERT INTO `categories` (`category_name`, `status`) VALUES ('$categories', '1')";
       
  
      $res = mysqli_query($conn , $sql);
      if($res){
      header('location:category.php');
      }
      die();
    }
   
  
   
}


?>
<?php include_once('header.php');?>
		
		<!-------------------------sidebar------------>
<?php include_once('sidebar.php');?>
		     <!-- Sidebar  -->
        
		
		<!--------page-content---------------->
		
		
		   
		   <!--top--navbar----design--------->
<?php include_once('top-header.php');?>		   
		   
<div class="row">
			     <div style="margin-left: 39px;" class="col-lg-11 col-md-12">
				   <div class="card" style="min-height:650px;margin-bottom: 62px;">
				       <div class="card-header card-header-text">
					      <h2 class="card-title">Add Categories</h2>
						
					   </div>
					   <div class="card-content table-responsive">
					      <!-- form  -->

                          <form action="/crushstore/admin/add_category.php" method="POST">
                          <div class="container">
                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label ">Categories</label>
                            <input type="text" name="categories" class="form-control" id="exampleFormControlInput1" value = "<?php echo $categories_name; ?>" required>
                            <span class="text-danger"><?php echo $msg; ?></span>
                            </div>
                            <button style="background: #1D7A8C!important;" class="btn text-light" type="submit" name="submit">Add category </button>
                          </div>
                          </form>
                        
					   </div>
				   </div>
				 <div>
			  </div>
		     
		     

		  
<?php include_once('footer.php');?>		   
		   
		 
			 
			