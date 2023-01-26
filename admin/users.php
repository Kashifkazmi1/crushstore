<?php
session_start();
if($_SESSION['loggedin'] != true && $_SESSION['username'] != "kashif"){
	header('location:/crushstore/index.php');
}
?>
<?php include('partials/config.inc.php');
 include('partials/function.inc.php');
 if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($conn,$_GET['type']);
	

}
// delete 
if(isset($_GET['delete'])){
    
    $id = get_safe_value($conn , $_GET['delete']);
    $delete_sql = "DELETE FROM `user` WHERE `user`.`id` = '$id' ";
    $res = mysqli_query($conn,$delete_sql);
}
 $sql = "SELECT * FROM `user` ORDER by 'desc'";
 $res = mysqli_query($conn , $sql);




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
								<tr>
								<th scope="col">ID</th>
								<th scope="col">Name</th>
								<th scope="col">Email</th>
								
								<th scope="col">Date</th>
								<th scope="col"></th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 0 ;
								while ($row = mysqli_fetch_assoc($res)) { 
									$i++; ?>
									
								<tr>
								<th scope="row"> <?php echo $i; ?> </th>
								<td><?php echo $row['username']; ?></td>
								<td><?php echo $row['email']; ?></td>
								<td><?php echo $row['date']; ?></td>
								
								
								
								<td > 
							<?php	
							 
							echo "<span class = 'btn  btn-danger btn-sm delete-btn'><a class='text-light' id=".$row['id']."'>Delete </a></span>&nbsp;";
							 ?> 
							 </td>
								</tr>
								<?php } ?>
							</tbody>
							</table>
					   </div>
				   </div>
				 <div>
			  </div>
		     
  
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
<?php include_once('footer.php');?>		   
		   
		 
			 
			