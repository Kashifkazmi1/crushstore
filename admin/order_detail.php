<?php

include 'partials/config.inc.php';
$order_id = $_GET['id'];
if (isset($_POST['submit'])) {
  $update_status = $_POST['update_status'];
  $update_res = mysqli_query($conn, "UPDATE `buy` SET `order_status` = '$update_status' WHERE `buy`.`id` = '$order_id'");
  
}
?>
<?php include_once('header.php');?>
		
		<!-------------------------sidebar------------>
<?php include_once('sidebar.php');?>
		     <!-- Sidebar  -->
        
		
		<!--------page-content---------------->
		
		
		   
		   <!--top--navbar----design--------->
<?php include_once('top-header.php');?>		   
		   
		  	   
			  <!---row-second----->
			  
			  <div class="row">
			     <div style="margin-left: 39px;" class="col-lg-11 col-md-12">
				   <div class="card" style="min-height:650px;margin-bottom: 62px;">
				       <div class="card-header card-header-text">
					      <h2 class="card-title">Order Detail</h2>
						  
					   </div>
             
					   <div class="card-content table-responsive">
					   <table class="table text-nowrap">
                  <thead class="bg-light">
                    <tr>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase"></strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Product</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">QTY</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Price</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Total Price</strong></th>
                      
                    </tr>
                  </thead>
                  <tbody class="border-0">
                 
                  <?php  
                 
                    $res = mysqli_query($conn,"SELECT DISTINCT(order_detail.id),order_detail.*,product.name,product.img,buy.address,buy.city,buy.moblie,buy.user_name,order_status.order_status_name FROM order_detail , product,buy,order_status WHERE order_detail.order_id = '$order_id' AND order_detail.product_id=product.id and buy.order_status = order_status.id");
                    
                  
                
                 while ($row = mysqli_fetch_assoc($res)) { ?>
                    <tr>
                    
                     <td class="p-3 align-middle border-0">
                     <img src="media/product/<?php echo $row['img']; ?>"  width="70"/>
                  </td>
                     <td class="p-3 align-middle border-0">
                        <p class="mb-0 small"><?php echo $row['name']; ?></p>
                      </td>
                     <td class="p-3 align-middle border-0">
                        <p style="width:168px!important; overflow:auto!important;" class="mb-0 small"><?php echo $row['qty']; ?></p>
                      </td>
                     <td class="p-3 align-middle border-0">
                        <p class="mb-0 small"><?php echo $row['price']; ?></p>
                      </td>
                     <td class="p-3 align-middle border-0">
                        <p class="mb-0 small"><?php echo $row['price'] * $row['qty']; ?></p>
                      </td>
                    
                      
                      </tr>
                     

                  
                      <?php
                    $address = $row['address'];
                    $user_name = $row['user_name'];
                    $city = $row['city'];
                    $moblie = $row['moblie'];
                    $order_status = $row['order_status_name'];
                  }
                  ?>
                   
                  </tbody>
                 
                  <h6><b>Name :</b><?php echo $user_name; ?> </h6>
                 
                  <h6><b>Address :</b><?php echo $address; ?> </h6>
                  <h6><b>City :</b><?php echo $city; ?> </h6>
                  <h6><b>Moblie :</b><?php echo $moblie; ?> </h6>
                    <h6><b>Order Status :</b><?php echo $order_status; ?> </h6>
                  
                  <form action="" method="post">
                     <select name="update_status" class="form-control" >
                           <option>Select Status</option>    
                           <?php
                            $res = mysqli_query($conn,"select * from order_status");
                            while ($row = mysqli_fetch_assoc($res)) {
                               echo "<option  value=".$row['id'].">".$row['order_status_name']."</option>";
                            }
                           ?>
                           </select>
                           <button type="btn" name="submit" class="btn  btn-primary btn-sm my-1 mb-2">update</button>
                           </form>
                  <script>
		// delete data 

		deletes = document.getElementsByClassName('delete-btn');
    Array.from(deletes).forEach((element) => {
        element.addEventListener("click",(e)=>{
            console.log("edit",);
            id = e.target.id.substr(0,2);

            if(confirm("Are you sure to delete this category")){
                console.log("yes");
                window.location = `/crushstore/admin/users.php?delete=${id}`;
            }else{
                console.log("no");
            }
            
        })
    });
	</script>		  
	   
		   
		 
			 
			