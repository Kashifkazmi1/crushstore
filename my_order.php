<?php 
include 'partials/config.php';

$pname='';
$price='';
$mrp='';
$img='';
$qty='';


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>my orders | Crush Store - easy shopping</title>
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
<style>
  .border{
    border: none!important;
  }
</style>

    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
   <?php
   include("partials/header.php");
    ?>

       
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(img/banners/banner4.jpg) no-repeat scroll center center / cover ;    border-radius: 70px;
">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a style="color:white;" class="breadcrumb-item" href="index.php">My Orders</a>
                                  <span  style="color:white;" class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span style="color:white;" class="breadcrumb-item active">shopping details</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    
                     
                        <form action="#">               
                            <div class="table-content table-responsive">
                                <table style="border: none; ">
                                    <thead style="background: aliceblue;" >
                                        <tr>
                                        <th class="border-0 p-3 border" scope="col"> <strong class="text-sm text-uppercase">Order ID</strong></th>
                      <th  class="border-0 p-3 border" scope="col"> <strong class="text-sm text-uppercase">Order Date</strong></th>
                      <th class="border-0 p-3 border" scope="col"> <strong class="text-sm text-uppercase">Address</strong></th>
                      <th class="border-0 p-3 border" scope="col"> <strong class="text-sm text-uppercase">Payment Type</strong></th>
                      <th class="border-0 p-3 border" scope="col"> <strong class="text-sm text-uppercase">Payment Status</strong></th>
                      <th class="border-0 p-3 border" scope="col"> <strong class="text-sm text-uppercase">Order Status</strong></th>
                      <th class="border-0 p-3 border" scope="col"> <strong class="text-sm text-uppercase"></strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tbody class="border-0">
                 
                 <?php  
                //  show detail of buy 
                 $uid = $_SESSION['UID'];
                 $res = mysqli_query($conn,"SELECT buy.* ,product.category_id,order_status.order_status_name as order_status_str  from `buy` ,product, order_status  where buy.user_id = '$uid' AND order_status.id = buy.order_status" );
                 while ($row = mysqli_fetch_assoc($res)) { ?>
                   <tr>
                   <?php
                   //  get order id through order detail 
                   $order_id = $row['id'];
                   $sql_order = "SELECT * FROM `order_detail` WHERE order_id = $order_id";
                   $res_order = mysqli_query($conn, $sql_order);
                   while ($row_order = mysqli_fetch_assoc($res_order)) {
                     // get product name through product id 
                     $product_id = $row_order['product_id'];
                     $sql_pro = "SELECT * FROM `product` WHERE id = $product_id";
                     $res_pro = mysqli_query($conn, $sql_pro);
                     while ($row_pro = mysqli_fetch_assoc($res_pro)) {
                   ?>
                    <td style="border: none; background: antiquewhite;" class="p-3 align-middle border-0">
                    <a href="product-details.php?id=<?php echo $row_order['product_id']; ?>&cat=<?php echo $row['category_id']; ?> " > <p  class="mb-0 "><?php echo $row_pro['name']; ?></p>
                    </a>
                  
                  </td>
                    <td style="border: none;" class="p-3 align-middle border-0">
                       <p class="mb-0 small"><?php echo $row['added_on']; ?></p>
                     </td>
                    <td style="border: none;" class="p-3 align-middle border-0">
                       <p style="width:168px!important; overflow:auto!important;" class="mb-0 "><?php echo $row['address']; ?></p>
                     </td>
                    <td style="border: none;" class="p-3 align-middle border-0">
                       <p class="mb-0 "><?php echo $row['payment_type']; ?></p>
                     </td>
                    <td style="border: none;" class="p-3 align-middle border-0">
                       <p class="mb-0 <?php if ($row['payment_status'] == "pending") {
                         echo "text-danger";
                       } else {
                         echo "text-info";} ?> "><b><?php echo $row['payment_status']; ?></b></p>
                     </td>
                    <td style="border: none;" class="p-3 align-middle border-0">
                       <p class="mb-0 "><?php echo $row['order_status_str']; ?></p>
                     </td>
                     
                     </tr>
                     

                 <?php
                     }
                   }
                 }
                 ?>
                    
                    
                 </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="buttons-cart--inner">
                                        <div class="buttons-cart">
                                            <a href="shop.php">Continue Shopping</a>
                                        </div>
                                        <div class="buttons-cart checkout--btn">
                                            <a href="contact.php">Contact</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
        <!-- End Banner Area -->
      <?php
       include("partials/footer.php");
       include ('partials/modal.php');
       include ('partials/modalJs.php');
      
      ?>
    </div>
 
 <script>
   
  //ajax send message 
 
  function manage_cart(pid,type){
 if (type=="update") {
   var qty=jQuery('#update').val();
    var pid;
 }
    
          $.ajax({
              url:'manage_cart.php',
              type:'post',
              data:'pid='+pid+'&qty='+qty+'&type='+type,
              success:function(result){
                
                  window.location.href="cart.php";
                
                 
              }
          });
      }
  
 </script>
   

    <!-- jquery latest version -->
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