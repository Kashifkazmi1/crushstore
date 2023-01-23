<?php 
include("modules/signup.php"); 


 ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Register|Crush store - Easy online shopping</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">


    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
  <?php include ('partials/header.php'); ?>

       
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(img/banners/banner3.jpg) no-repeat scroll center center / cover ;    border-radius: 70px;
">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav style="    margin-left: 51%;" class="bradcaump-inner">
                                  <a style="color:white ;" class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span style="color:white ;" class="breadcrumb-item active">Login</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Contact Area -->
        <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
					<div class="col-md-6">
                    <img id="signupimg"  style="margin-top:0%;" src="img/banners/login.jpg"
                  class="img-fluid" alt=" image">
						<div style="display:none ;" id="login" class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Login</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form id="contact-form" action="index.php" method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="email" id="username" name="username" placeholder="Your Email*" style="width:100%">
										</div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="password" id="password"  name="password" placeholder="Your Password*" style="width:100%">
										</div>
									</div>
									
									<div class="contact-btn">
                                      
										<button type="button" id="login-btn"  class="fv-btn"> Login</button>
									</div>
								</form>
								<div class="form-output">
									<p class="form-messege text-danger" id="error"></p>
								</div>
							</div>
						</div> 
                
				</div>
				
                
					<div  id="loginimg" style="display:none ;" class="col-md-6">
                    <img  style="margin-top:0%;" src="img/banners/login.jpg"
                  class="img-fluid" alt=" image">
                  </div>
                  <div id="login" class="col-md-6">
						<div id="signup" class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Register</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form id="contact-form" action="#" method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="username" placeholder="Your Name*" style="width:100%">
										</div>
									</div>
									<div style="margin-bottom: 34px;" class="single-contact-form">
										<div class="contact-box name">
											<input type="email" name="email" placeholder="Your Email*" style="width:100%">
										</div>
									</div>
									<p> <?php if($userExist == true){ echo "<span class='text-danger'> user email already exist try another </span> "; } ?> </p>
									
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="password" name="password" placeholder="Your Password*" style="width:100%">
										</div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="password" name="cpassword" placeholder="Confirm Password*" style="width:100%">
										</div>
									</div>
									<p> <?php if($passDoNotMatch == true){ echo "<span class='text-danger'> Password do not match try again </span> "; } ?></p>
									<div class="contact-btn">
										<button type="submit" class="fv-btn">Register</button>
									</div>
								</form>
								<div class="form-output" id="already">
									<a ><p  class="form-messege text-danger">Already have an Acount?</p></a>
								</div>
							</div>
						</div> 
                
				</div>
					
            </div>
        </section>
        <?php
      include ('partials/footer.php');
     ?>
  

     <?php  
     include ('partials/modal.php');
     include ('partials/modalJs.php');
     ?>
 
      <script>
       $(document).ready(function(){
     $('#already').click(function(){
           $('#signup').fadeOut();
           $('#signupimg').slideUp();
           $('#login').fadeIn();
           $('#loginimg').slideDown();
          var login = true;

  
          $(document).ready(function(){
         $("#login-btn").click(function(){
             var username = $("#username").val();
             var password = $("#password").val();
             $.ajax({
                 url:"signin.php",
                 type:"POST",
                 data:"username="+username + "&password="+ password,
                 success: function(result){
                     $("#error").html(result);
                     if(result!="Password do not match")
                     {
                         window.location.href="shop.php";
                     }
                 }
             })
         })
     })
        });
    
     
      });
      </script>
    <!-- jquery latest version -->
    <script src="js/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="js/plugins.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/ajax-mail.js"></script>

    
    <!-- Waypoints.min.js. -->
    <script src="js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="js/main.js"></script>

</body>

</html>