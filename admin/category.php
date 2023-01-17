<?php
session_start();
if($_SESSION['loggedin'] != true && $_SESSION['username'] != "kashif"){
	header('location:/cashzone/index.php');
}
?>

<?php include('partials/config.inc.php');
 include('partials/function.inc.php');

if(isset($_GET['type'])&& $_GET['type'] != '' ){
	$type = get_safe_value($conn , $_GET['type']);
//    active ko deactive deactive ko active kerne kay liay 
	if($type == "status"){
	$id = get_safe_value($conn , $_GET['id']);
	$operation = get_safe_value($conn , $_GET['operation']);
	if ($operation == "active") {
		$status = '1';
	}else{
		$status = '0';

	}
  $update_status = "UPDATE `categories` SET `status` = '$status' WHERE `categories`.`id` = $id";
  $res = mysqli_query($conn,$update_status);
	}
	
}
// delete 
if(isset($_GET['delete'])){
    
    $id = get_safe_value($conn , $_GET['delete']);
    $delete_sql = "DELETE FROM `categories` WHERE `categories`.`id` = '$id' ";
    $res = mysqli_query($conn,$delete_sql);
}
 $sql = "SELECT * FROM `categories` ORDER by 'asc'";
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
					      <h2 class="card-title">Categories</h2>
						  <h4 class="category"><a style="text-decoration: underline;" href="add_category.php"> Add new category</a></h4>
					   </div>
					   <div class="card-content table-responsive">
					   <table class="table">
							<thead style="background: aliceblue;">
								<tr>
								<th scope="col">#</th>
								<th scope="col">Categories</th>
								<th scope="col">Status</th>
								<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 0 ;
								while ($row = mysqli_fetch_assoc($res)) { 
									$i++; ?>
									
								<tr>
								<th scope="row"> <?php echo $i; ?> </th>
								<td><?php echo $row['category_name']; ?></td>
								<td>
									<?php if($row['status'] == 1){
										echo "<span class = 'btn  btn-primary btn-sm'> <a class='text-light' href='?type=status&operation=deactive&id=".$row['id']."'>Active </a></span> &nbsp;";
									}else{
										echo "<span class='btn btn-warning btn-sm'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive </a></span>&nbsp;";

									} ?></td>
								<td > 
							<?php	
							echo "<span class = 'btn  btn-info btn-sm'><a class='text-light' href='update_category.php?id=".$row['id']."'>Edit </a></span>&nbsp;";  
						//	echo "<span class = 'btn  btn-danger btn-sm'><a class='text-light' href='?type=delete&id=".$row['id']."'>Delete </a></span>&nbsp;";
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
                window.location = `/cashzone/admin/category.php?delete=${id}`;
            }else{
                console.log("no");
            }
            
        })
    });
	</script>
		  
<?php include_once('footer.php');?>		   
		   
		 
			 
			