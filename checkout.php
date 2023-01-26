
<?php
include("partials/config.php");
include("partials/header.php"); 

$cart_total=0;
// session_start();
foreach ($_SESSION['cart'] as $key => $val) {
  $sql ="SELECT * FROM `product` where id = $key";
  $res= mysqli_query($conn,$sql);
  $productArr = array();
  while ($row = mysqli_fetch_assoc($res)) {
   $productArr[] = $row;
  }
 $price=$productArr[0]['price'];
 $qty=$val['qty'];
 $cart_total=$cart_total+($price*$qty);}
if($_SERVER["REQUEST_METHOD"]=="POST" ){
  $name = mysqli_real_escape_string($conn , $_POST["name"]);
  $number = mysqli_real_escape_string($conn ,$_POST["number"]);
  $address1 = mysqli_real_escape_string($conn ,$_POST["address1"]);
  $address2 = mysqli_real_escape_string($conn ,$_POST["address2"]);
  $pos = mysqli_real_escape_string($conn ,$_POST["pos"]);
  $city = mysqli_real_escape_string($conn ,$_POST["city"]);
  $pay_type = mysqli_real_escape_string($conn ,$_POST['pay_type']);
  $user_id =$_SESSION['UID'];
  
  $total_price =$cart_total;
  $payment_status = "pending";
  if ($payment_type == "COD") {
     $payment_status = "success";
  }
  $order_status = "1";
  if ($name != '') {
    $res = mysqli_query($conn,"INSERT INTO `buy` (`user_id`, `user_name`, `city`, `total_price`, `payment_status`, `order_status`, `address`, `address2`, `moblie`, `postal_code`, `payment_type`) VALUES ('$user_id', '$name', '$city', '$total_price', '$payment_status', '$order_status', '$address1', '$address2', '$number', '$pos', '$pay_type')");
  }else {
    ?>
  <script> window.location.href='checkout.php';</script>
  
  <?php
  }
 
 $order_id = mysqli_insert_id($conn);
 foreach ($_SESSION['cart'] as $key => $val) {
  $sql ="SELECT * FROM `product` where id = $key";
  $res= mysqli_query($conn,$sql);
  $productArr = array();
  while ($row = mysqli_fetch_assoc($res)) {
   $productArr[] = $row;
  }
  $price=$productArr[0]['price'];
  $qty=$val['qty'];
 
  mysqli_query($conn,"INSERT INTO `order_detail` (`order_id`, `product_id`, `qty`, `price`) VALUES ('$order_id', '$key', '$qty', '$price')");
}
if ($res) {
  
  ?>
  <script> window.location.href='index.php';</script>
  
  <?php
    exit;
}
}

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Checkout | Crush Store - easy online shopping</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="img/bebo-logo.png">
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
   <?php 
   ?>
        
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(img/banners/hero-shop.jpg) no-repeat scroll center center / cover ;border-radius: 70px;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">checkout</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="checkout-wrap ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="checkout__inner">
                            <div class="accordion-list">
                                <div class="accordion">
                                    <?php if (!isset($_SESSION['loggedin'])) { ?>
                                        <script>alert("Please login");</script>
                                    <div class="accordion__title">
                                        Checkout Method
                                    </div>
                                    <div class="accordion__body">
                                        <div class="accordion__body__form">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="checkout-method__login">
                                                        <form action="#">
                                                            <h5 class="checkout-method__title">Login</h5>
                                                            <div class="single-input">
                                                                <label for="user-email">Email Address</label>
                                                                <input type="email" id="username">
                                                            </div>
                                                            <div class="single-input">
                                                                <label for="user-pass">Password</label>
                                                                <input type="password" id="password">
                                                            </div>
                                                            <p class="require" id="error"></p>
                                                            <div class="dark-btn">
                                                                <a href="javascript:void(0)" onclick="login()">LogIn</a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="checkout-method__login">
                                                        <form action="#">
                                                            <h5 class="checkout-method__title">Register</h5>
                                                            <div class="single-input">
                                                                <label for="user-email">Name</label>
                                                                <input type="text" id="username">
                                                            </div>
															<div class="single-input">
                                                                <label for="user-email">Email Address</label>
                                                                <input type="email" id="email">
                                                            </div>
															<p class="text-danger" id="error"></p>
                                                            <div class="single-input">
                                                                <label for="user-pass">Password</label>
                                                                <input type="password" id="password">
                                                            </div>
                                                            <div class="dark-btn">
                                                                <a  href="javascript:void(0)" onclick="signup()">Register</a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }else{ ?>

                                    <div class="accordion__title">
                                        Address Information
                                    </div>
                                    <div class="accordion__body">
                                        <div class="bilinfo">
                                            <form action="#" method="post">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <input type="text" name="name" placeholder="Your name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <input type="text" name="address1" placeholder="Your Address">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <input type="text" name="address2" placeholder="Mentioned another address (optional)">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" name="city" placeholder="City/State">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" name="pos" placeholder="Post code/ zip">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                           <input type="checkbox" name="pay_type" value="COD"><p>Cash on delevery</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" name="number" placeholder="Phone number">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div >
                                            
                                            <button style="background:#c43b68;border: none;color: white;margin-top: 10px;" type="submit" class=" btn-lg "> submit</button>
                                        </div>
                                            </form>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="accordion__title">
                                        payment information
                                    </div>
                                    <div class="accordion__body">
                                        <div class="paymentinfo">
                                            <div class="single-method">
                                                <a href="#"><i class="zmdi zmdi-long-arrow-right"></i>Check/ Money Order</a>
                                            </div>
                                            <div class="single-method">
                                                <a href="#" class="paymentinfo-credit-trigger"><i class="zmdi zmdi-long-arrow-right"></i>Credit Card</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="order-details">
                            <h5 class="order-details__title">Your Order</h5>
                            
                            <?php 
                 
                     
                   $cart_total=0;
                            foreach ($_SESSION['cart'] as $key => $val) {

                                $sql = "SELECT * FROM `product` where id = $key";
                                $res = mysqli_query($conn, $sql);
                                $productArr = array();
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $productArr[] = $row;
                                }
                                $pname = $productArr[0]['name'];
                                $price = $productArr[0]['price'];
                                $mrp = $productArr[0]['mrp'];
                                $img = $productArr[0]['img'];
                                $qty = $val['qty'];
                                $cart_total = $cart_total + ($price * $qty);


                            ?>
                              <div class="order-details__item">
                                <div class="single-item">
                                    <div class="single-item__thumb">
                                        <img src="admin/media/product/<?php echo $img; ?>" alt="ordered item">
                                    </div>
                                    <div class="single-item__content">
                                        <a href="#"><?php echo $pname; ?></a>
                                        <span class="price">$<?php echo $price; ?></span>
                                    </div>
                                    <div class="single-item__remove">
                                        <a  href="javascript:void(0)" id="del" onclick="manage_cart('<?php echo $key; ?>','remove');"><i class="zmdi zmdi-delete"></i></a>
                                    </div>
                                </div>
                               
                            </div>
                            <?php }?>
                            <div class="order-details__count">
                                <div class="order-details__count__single">
                                    <h5>sub total</h5>
                                    <span class="price">$<?php echo $cart_total; ?></span>
                                </div>
                                <div class="order-details__count__single">
                                    <h5>Tax</h5>
                                    <span class="price">$0</span>
                                </div>
                            </div>
                            <div class="ordre-details__total">
                                <h5>Order total</h5>
                                <span class="price">$<?php echo $cart_total; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
        <?php
      include ('partials/footer.php');
     ?>

     <?php  
    include ('partials/modal.php');
     include ('partials/modalJs.php');
     

     ?>

<script type="text/javascript" src="js/jquery.js"></script>

     <script>

function login(){
             var username=jQuery("#username").val();
             var password=jQuery("#password").val();
            
             
        //    validation 
            if(username==""){
                alert("please enter username");
            }else if(password==""){
                alert("please enter password");
            }else{
                $.ajax({
                    url:'signin.php',
                    type:'post',
                    data:"username="+username+"&password="+password,
                    success:function(data){
                        $("#error").html(data);
                        if(data==''){
                        window.location.reload();}
                    }
                });
            }
        }

function signup(){
             var username=jQuery("#username").val();
             var email=jQuery("#email").val();
             var password=jQuery("#password").val();
            
             
        //    validation 
            if(username==""){
                alert("please enter name");
            }else if(email ==""){
                alert("please enter email");
            }else if(password==""){
                alert("please enter password");
            }else{
                $.ajax({
                    url:'signup.php',
                    type:'post',
                    data:"username="+username+"&email="+email+"&password="+password,
                    success:function(data){
                        $("#error").html(data);
                        if(data==''){
                        window.location.reload();}
                    }
                });
            }
        }

        $(document).ready(function(){
            $("#del").on("click",function(){
                window.location.reload();
            })
        })
     </script>
    
    <script src="js/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="js/plugins.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!-- Waypoints.min.js. -->
    <script src="js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="js/main.js"></script>

</body>

</html>