
<?php
session_start();
if($_SESSION['loggedin'] != true && $_SESSION['username'] != "kashif"){
	header('location:/crushstore/index.php');
}
?>
<?php include_once('header.php');?>
		
		<!-------------------------sidebar------------>
<?php include_once('sidebar.php');?>
		     <!-- Sidebar  -->
        
		
		<!--------page-content---------------->
		
		
		   
		   <!--top--navbar----design--------->
<?php include_once('top-header.php');?>		   
		   
		   <!--------main-content------------->
<?php include_once('main-content.php');?>		   
		   
			 
			 <!---footer---->
<?php include_once('footer.php');?>			 
			 
			