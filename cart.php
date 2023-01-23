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
    <title>Cart | Crush Store - easy shopping</title>
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
                                  <a style="color:white;" class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span style="color:white;" class="breadcrumb-item active">shopping cart</span>
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
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">products</th>
                                            <th class="product-name">name of products</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                if(isset($_SESSION['cart'])&& $_SESSION['cart']!=''){

                
                     
                   $cart_total=0;
                   foreach ($_SESSION['cart'] as $key => $val) { 
                     
                     $sql ="SELECT * FROM `product` where id = $key";
                     $res= mysqli_query($conn,$sql);
                     $productArr = array();
                     while ($row = mysqli_fetch_assoc($res)) {
                      $productArr[] = $row;
                     }
                    $pname=$productArr[0]['name'];
                    $priceString=$productArr[0]['price'];
                    $mrp=$productArr[0]['mrp'];
                    $img=$productArr[0]['img'];
                    $qtyString = $val['qty'];
                    $price = intval($priceString);
                    $qty = intval($qtyString);
                    $cart_total = $cart_total + $price*$qty;
                     if($_SESSION['cart']!=true)
                        {
                          echo '<b>No items found in add to cart</b>';
                        }else{?>
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="admin/media/product/<?php echo $img; ?>" alt="product img" /></a></td>
                                            <td class="product-name"><a href="#"><?php echo $pname; ?></a>
                                                <ul  class="pro__prize">
                                                    <li class="old__prize">$<?php echo $mrp ?></li>
                                                    <li>$<?php echo $price; ?></li>
                                                </ul>
                                            </td>
                                            <td class="product-price"><span class="amount">$<?php echo ($price * $qty); ?></span></td>
                                            <td class="product-quantity"><input id="update" type="number" value="<?php echo $qty; ?>" /> 
                                            <a class="btn-lg bg-info " href="javascript:void(0)" onclick="manage_cart('<?php echo $key; ?>','update');">update</a>
                                        
                                        </td>
                                            <td class="product-subtotal">$<?php echo ($price * $qty); ?></td>
                                            <td class="product-remove"><a  href="javascript:void(0)" onclick="manage_cart('<?php echo $key; ?>','remove');" ><i class="icon-trash icons"></i></a></td>
                                            
                                        </tr> 
                                        <?php }} ?>
                                    <?php }else{
                                        $cart_total = '';
                                        } ?>
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
                                            <a href="checkout.php">checkout</a>
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