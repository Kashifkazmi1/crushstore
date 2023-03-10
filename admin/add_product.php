<?php
session_start();
if($_SESSION['loggedin'] != true && $_SESSION['username'] != "kashif"){
	header('location:/crushstore/index.php');
}
?>

<?php
include('partials/config.inc.php');
include('partials/function.inc.php');
// initailize form value variables 
$category_id='';
$name='';
$mrp='';
$price='';
$qty='';
$image='';
$short_desc	='';
$description='';
$meta_title	='';
$meta_description	='';
$meta_keyword='';
$categories_name = '';
$msg = '';

// get data from form 
if(isset($_POST['submit'])){
	$categories_id=get_safe_value($conn,$_POST['categories_id']);
	$name=get_safe_value($conn,$_POST['name']);
	$mrp=get_safe_value($conn,$_POST['mrp']);
	$price=get_safe_value($conn,$_POST['price']);
	$qty=get_safe_value($conn,$_POST['qty']);
	$short_desc=get_safe_value($conn,$_POST['short_desc']);
	$description=get_safe_value($conn,$_POST['description']);
	$meta_title=get_safe_value($conn,$_POST['meta_title']);
	$meta_desc=get_safe_value($conn,$_POST['meta_desc']);
	$meta_keyword=get_safe_value($conn,$_POST['meta_keyword']);
	// check same name product exsit 
	$res=mysqli_query($conn,"select * from product where name='$name'");
	$check=mysqli_num_rows($res);
	if($check>0){
	
				$msg="Product already exist";

	}else{

		if($_FILES['image']['type']!=''){
			if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
			$msg="Please select only png,jpg and jpeg image formate";
		}else{
			$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
			mysqli_query($conn,"insert into product(category_id,name,mrp,price,qty,short_desc,description,meta_title,meta_desc,meta_keyword,status,img) values('$categories_id','$name','$mrp','$price','$qty','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword',1,'$image')");
			header('location:product.php');
		}	
	}
	
}}
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
					      <h2 class="card-title">Add Products</h2>
						
					   </div>
					   <div class="card-content table-responsive">
					      <!-- form  -->

                          <form action="/crushstore/admin/add_product.php" method="POST" enctype="multipart/form-data">
                          <div class="container">
                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label ">Categories</label>
                            <select name="categories_id" class="form-control" >
                           <option>Select category</option>    
                           <?php
                            $res = mysqli_query($conn,"select id,category_name from categories order by category_name asc");
                            while ($row = mysqli_fetch_assoc($res)) {
                               echo "<option selected value=".$row['id'].">".$row['category_name']."</option>";
                            }
                           ?>
                           </select>
                            </div>

                            <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label ">Product</label>
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder = "Enter product name" value ="<?php echo $name; ?>" required>
                            </div>
                                                

                            <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label ">Product MRP</label>
                            <input type="text" name="mrp" class="form-control" id="exampleFormControlInput1" placeholder = "Enter product mrp" value ="<?php echo $mrp; ?>" required>
                            </div>
                                                

                            <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label ">Price</label>
                            <input type="text" name="price" class="form-control" id="exampleFormControlInput1" placeholder = "Enter product price" value ="<?php echo $price; ?>" required>
                            </div>
                                                

                            <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label ">Quantity</label>
                            <input type="text" name="qty" class="form-control" id="exampleFormControlInput1" placeholder = "Quantity" value ="<?php echo $qty; ?>" required>
                            </div>
                                                

                            <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label ">image</label>
                            <input type="file" name="image" class="form-control" id="exampleFormControlInput1"  required>
                            </div>
                                                

                            <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label ">Short description</label>
                            <textarea name="short_desc" class="form-control" placeholder="Enter short description" required ><?php echo $short_desc; ?></textarea>
                            </div>
                                                

                            <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label ">Description</label>
                            <textarea name="description" class="form-control" placeholder="Enter description" required ><?php echo $description; ?></textarea>
                            </div>
                                                

                            <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label ">Meta Title</label>
                            <textarea name="meta_title" class="form-control" placeholder="Enter Meta title" ><?php echo $meta_title; ?></textarea>
                            </div>
                                                

                            <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label ">Meta Description</label>
                            <input type="text" name="meta_desc" class="form-control" id="exampleFormControlInput1" placeholder = "Enter Meta description" value ="<?php echo $meta_description; ?>" >
                            </div>
                                                

                            <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label ">Meta Keyword</label>
                            <input type="text" name="meta_keyword" class="form-control" id="exampleFormControlInput1" placeholder = "Enter Meta keyword" value ="<?php echo $meta_keyword; ?>" >
                            </div>
                                                

                                                
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
		   
		 
			 
			