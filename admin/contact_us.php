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
	if($type=='delete'){
		$id=get_safe_value($conn,$_GET['id']);
		$delete_sql = "DELETE FROM `contact_us` WHERE `contact_us`.`id` = $id ";
       $res=mysqli_query($conn,$delete_sql);
	}

}
 $sql = "SELECT * FROM `contact_us` ORDER by 'desc'";
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
								<th scope="col">Moblie</th>
								<th scope="col">Query</th>
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
								<td><?php echo $row['name']; ?></td>
								<td><?php echo $row['moblie']; ?></td>
								<td><?php echo $row['message']; ?></td>
								<td><?php echo $row['added_on']; ?></td>
								
								
								<td > 
							<?php	
							 
							echo "<span class = 'btn  btn-danger btn-sm'><a class='text-light' href='?type=delete&id=".$row['id']."'>Delete </a></span>&nbsp;";
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
		     

		  
<?php include_once('footer.php');?>		   
		   
		 
			 
			