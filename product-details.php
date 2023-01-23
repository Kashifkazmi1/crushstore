<?php 

include 'partials/config.php';

 $id = mysqli_real_escape_string($conn, $_GET['id']);
 $cat = mysqli_real_escape_string($conn, $_GET['cat']);
 $sql = "SELECT * FROM `product` WHERE status = 1 and id=  $id";
 $res = mysqli_query($conn,$sql);

 $sql_product ="SELECT * FROM `product` where status = 1 order by id asc LIMIT 4 ";
 $res_product = mysqli_query($conn,$sql_product);
 $data = array();
 while ($row = mysqli_fetch_assoc($res_product)) {
     $data[]=$row;
 }
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Product Details | Crush Store</title>
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
  
    <div class="wrapper">
     <?php include('partials/header.php'); ?>

     <?php while ($list = mysqli_fetch_assoc($res)) { ?>
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(img/banners/slider_1.jpg) no-repeat scroll center top / cover ;    border-radius: 70px;
">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row ">
                        <div class="col-xs-6">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <a class="breadcrumb-item" href="product-grid.html">Products</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active"><?php echo $list['name'] ?></span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
       
        <section class="htc__product__details bg__white ptb--100">
            <!-- Start Product Details Top -->
            <div class="htc__product__details__top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                            <div class="htc__product__details__tab__content">
                                <!-- Start Product Big Images -->
                                <div class="product__big__images">
                                    <div class="portfolio-full-image tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                            <img src="admin/media/product/<?php echo $list['img']; ?>" alt="full-image">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Product Big Images -->
                                
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="ht__product__dtl">
                                <h2><?php echo $list['name']; ?></h2>
                                <ul  class="pro__prize">
                                    <li class="old__prize">$<?php echo $list['mrp']; ?></li>
                                    <li>$<?php echo $list['price']; ?></li>
                                </ul>
                                <p class="pro__info"><?php echo $list['short_desc']; ?></p>
                                <div class="ht__pro__desc">
                                    <div class="sin__desc">
                                        <p><span>Availability:</span> <?php if ($list['status'] == 1) {
                 echo "In Stock";
             } else {
                 echo "Out Stock";} ?></p>
                                    </div>
                                    <div class="sin__desc align--left">
                                        <p><span>Categories:</span></p>
                                        <ul class="pro__cat__list">
                                            
                                        <?php
                                  
                                  $cat_sql = "SELECT * FROM `categories` WHERE id=  $cat";
                                  $cat_res = mysqli_query($conn,$cat_sql);
                                  
                                   while ($row = mysqli_fetch_assoc($cat_res) ){
                                  ?>
                                            <li><a href="category_page.php?cat_id=<?php echo $cat; ?>"><?php echo $row['category_name']; ?></a></li>
                                    <?php}?>      
                                        </ul>
                                        <a href="cart.php">
                                        <button style="margin-left:20px;"  onclick="add_cart('<?php echo $list['id']; ?>','add');" class="fv-btn"> Add to cart</button></a>
                                    </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Details Top -->
        </section>
        <!-- End Product Details Area -->
        <!-- Start Product Description -->
        <section class="htc__produc__decription bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Start List And Grid View -->
                        <ul class="pro__details__tab" role="tablist">
                            <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">description</a></li>
                        </ul>
                        <!-- End List And Grid View -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="ht__pro__details__content">
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                                <div class="pro__tab__content__inner">
                                   
                                    <h4 class="ht__pro__title">Description</h4>
                                    <p><?php echo $list['short_desc']; ?></p>
                                    <h4 class="ht__pro__title">Standard Featured</h4>
                                    <p><?php echo $list['description']; ?></p>
                                </div>
                            </div>
                            <!-- End Single Content -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php }} ?>
        <!-- End Product Description -->
        <!-- Start Product Area -->
        <section class="htc__product__area--2 pb--100 product-details-res">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">New Arrivals</h2>
                            <p>But I must explain to you how all this mistaken idea</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product__wrap clearfix">
                        <!-- Start Single Product -->
                        <?php $get_product = $data;

                        foreach ($get_product as $list) {

                        ?>
                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="product-details.html">
                                        <img src="admin/media/product/<?php echo $list['img']; ?>" alt="product images">
                                    </a>
                                </div>
                                <div class="fr__hover__info">
                                    <ul class="product__action">
                                        <li><a href="javascript:void(0)" onclick="wishlist('<?php echo $list['id']; ?>');"><i class="icon-heart icons"></i></a></li>

                                        <li><a  href="cart.php" onclick="add_cart('<?php echo $list['id']; ?>','add');"><i class="icon-handbag icons"></i></a></li>

                                        <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="fr__product__inner">
                                    <h4><a href="product-details.html"><?php echo $list['name']; ?></a></h4>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize"><?php echo $list['mrp']; ?></li>
                                        <li><?php echo $list['price']; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                         <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <?php include('partials/footer.php'); ?>
        <?php 
         include('partials/modal.php'); 
         include('partials/modalJs.php'); ?>
    
 
    

    <script src="js/jquery.js"></script>
    <script>

function add_cart(pid, type) {
    var qty = 1;
   


    $.ajax({
        url: 'manage_cart.php',
        type: 'post',
        data: 'pid=' + pid + '&qty=' + qty + '&type=' + type,
        success: function(result) {
            jQuery('.htc__qua').html(result);
            //window.location.reload();
        }
    });
}
</script>
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