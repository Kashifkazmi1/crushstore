<?php
include 'partials/config.inc.php';

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
					      <h2 class="card-title">Contact Us</h2>
						  
					   </div>
					   <div class="card-content table-responsive">
					   <table class="table">
							<thead style="background: aliceblue;">
							<table class="table text-nowrap">
                  <thead class="bg-light">
                    <tr>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Order ID</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Order Date</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Address</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Payment Type</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Payment Status</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Order Status</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase"></strong></th>
                    </tr>
                  </thead>
                  <tbody class="border-0">
                 
                  <?php  
                
                  $res = mysqli_query($conn,"SELECT buy.* ,order_status.order_status_name as order_status_str  from `buy` , order_status where order_status.id = buy.order_status ");
                  while ($row = mysqli_fetch_assoc($res)) { ?>
                    <tr>
                    
                     <td class="p-3 align-middle border-0">
                     <a href="order_detail.php?id=<?php  echo $row['id']; ?>"> <p  class="mb-0 small"><?php  echo $row['id']; ?></p>
                     </a></td>
                     <td class="p-3 align-middle border-0">
                        <p class="mb-0 small"><?php  echo $row['added_on']; ?></p>
                      </td>
                     <td class="p-3 align-middle border-0">
                        <p style="width:168px!important; overflow:auto!important;" class="mb-0 small"><?php  echo $row['address']; ?></p>
                      </td>
                     <td class="p-3 align-middle border-0">
                        <p class="mb-0 small"><?php  echo $row['payment_type']; ?></p>
                      </td>
                     <td class="p-3 align-middle border-0">
                        <p class="mb-0 small"><?php  echo $row['payment_status']; ?></p>
                      </td>
                     <td class="p-3 align-middle border-0">
                        <p class="mb-0 small"><?php  echo $row['order_status_str']; ?></p>
                      </td>
                      
                      </tr>
                      

                  <?php
                  }
                  ?>
                     
                     
                  </tbody>
			  <script>
		// delete data 

		deletes = document.getElementsByClassName('delete-btn');
    Array.from(deletes).forEach((element) => {
        element.addEventListener("click",(e)=>{
            console.log("edit",);
            id = e.target.id.substr(0,2);

            if(confirm("Are you sure to delete this category")){
                console.log("yes");
                window.location = `/cashzone/admin/users.php?delete=${id}`;
            }else{
                console.log("no");
            }
            
        })
    });
	</script>		  
	   
		   
		 
			 
			