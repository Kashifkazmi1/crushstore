<?php 
include 'partials/config.php';
$sort = '';
$sort_order = "";
$price_high = "";
$price_low = "";
$new = "";
$old = "";

if(isset($_GET['sort'])){
  $sort = mysqli_real_escape_string($conn,$_GET['sort']);
  if ($sort=="price_high") {
    $sort_order = "ORDER by price DESC";
    $price_high = "selected";
  }elseif ($sort=="price_low") {
    $sort_order = "ORDER by price ASC";
    $price_low = "selected";
  }elseif ($sort=="new") {
    $sort_order = "ORDER by id DESC";
    $new = "selected";
  }elseif ($sort=="old") {
    $sort_order = "ORDER by id ASC";
    $old = "selected";
  }
}
// function product
function cat_product($conn,$limit='',$cat_id='',$sort_order = ''){
   
  $sql ="SELECT * FROM `product` where status = 1 ";
  if ($cat_id!='') {
      $sql.=" and category_id = $cat_id ";
  
  }
  if ($sort_order!='') {
    $sql.= " ".$sort_order;
}else{
  $sql.="order by id desc ";

}

  if ($limit!='') {
      $sql.="limit  $limit";
  }
  $res=mysqli_query($conn,$sql);
  $data = array();
  while ($row = mysqli_fetch_assoc($res)) {
      $data[]=$row;
  }
 return $data;
}
 
 $id = mysqli_real_escape_string($conn, $_GET['id']);

  $sql = "SELECT category_name FROM `categories` WHERE id = $id";
  $res = mysqli_query($conn,$sql);
 
  
  $product = cat_product($conn,'',$id,$sort_order);
  $best_saler= mysqli_query($conn, "SELECT * FROM `product` LIMIT 6");
 

?>

<!doctype html>
<html >
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Categories | Crush Store - easy online shoping </title>
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
   <?php include ("partials/header.php"); ?>
   <section class=" bg-cover bg-center" style="background: url(img/banners/winter.jpg); border-radius: 70px;background-size: cover;
    background-position: center;
    margin: 1%;">
          <div style="height:365px;" class="container">
            <div class=" px-4 px-lg-5 py-lg-4 align-items-center">
              <div>
                 
                    
                <h1 style="margin: 123px 73px;" class="h2 text-uppercase text-dark mb-0 ">Categories/<b>
                             <?php
                                  while ($row = mysqli_fetch_assoc($res)) {
                                      echo $row['category_name'];
                                  }?>
                    </b></h1>
              </div>
                            
            </div>
          </div>
        </section>
        
        <!-- Start Product Grid -->
        <section class="htc__product__grid bg__white ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-lg-push-3 col-md-9 col-md-push-3 col-sm-12 col-xs-12">
                        <div class="htc__product__rightidebar">
                            <div class="htc__grid__top">
                                <div class="htc__select__option">
                                    <select class="ht__select" onchange="sort_product_drop()" id="sort_product_id" >
                                        <option>Default sorting</option>
                                        
                                            <option value="new" <?php echo ($new); ?>>Sort by new first </option>
                                            <option value="old" <?php echo ($old); ?>>Popularity </option>
                                            <option value="price_low" <?php echo ($price_low); ?>>Price: Low to High </option>
                                            <option value="price_high" <?php echo ($price_high); ?>>Price: High to Low </option>
                                    </select>
                                </div>
                                
                                <!-- Start List And Grid View -->
                                <ul class="view__mode" role="tablist">
                                    <li role="presentation" class="grid-view active"><a href="#grid-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li>
                                    <li role="presentation" class="list-view"><a href="#list-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
                                </ul>
                                <!-- End List And Grid View -->
                            </div>
                            <!-- Start Product View -->


                            <div class="row">
                                <div class="shop__grid__view__wrap">
                                    <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                        <!-- Start Single Product -->
                                        <?php
                                        if (count($product) > 0) {


                                            foreach ($product as $list) { ?>
                                        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                                            <div class="category">
                                                <div class="ht__cat__thumb">
                                                    <a href="product-details.php?id=<?php echo $list['id']; ?>&cat=<?php echo $list['category_id']; ?>">
                                                        <img src="admin/media/product/<?php echo $list['img']; ?>"  alt="product images">
                                                    </a>
                                                </div>
                                                <div class="fr__hover__info">
                                                    <ul class="product__action">
                                                        <li><a href="javascript:void(0)" onclick="wishlist('<?php echo $list['id']; ?>');"><i class="icon-heart icons"></i></a></li>

                                                        <li><a href="cart.php" onclick="add_cart('<?php echo $list['id']; ?>','add');"><i class="icon-handbag icons"></i></a></li>

                                                        <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="fr__product__inner">
                                                    <h4><a href="product-details.php?id=<?php echo $list['id']; ?>&cat=<?php echo $list['category_id']; ?>"><?php echo $list['name']; ?></a></h4>
                                                    <ul class="fr__pro__prize">
                                                        <li class="old__prize">$<?php echo $list['mrp']; ?></li>
                                                        <li>$<?php echo $list['price']; ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <?php }
                                        } else {
                                            echo "<h1 style='margin: 121px;'>No Product found</h1>";}?>
                                        <!-- End Single Product -->
                                       
                                    </div>
                                    <div role="tabpanel" id="list-view" class="single-grid-view tab-pane fade clearfix">
                                        <div class="col-xs-12">
                                            <div class="ht__list__wrap">
                                                <!-- Start List Product -->
                                                <?php
                                        if (count($product) > 0) {


                                            foreach ($product as $list) { ?>
                                                <div class="ht__list__product">
                                                    <div class="ht__list__thumb">
                                                        <a href="product-details.php?id=<?php echo $list['id']; ?>&cat=<?php echo $list['category_id']; ?>">
                                                            <img  src="admin/media/product/<?php echo $list['img']; ?>" alt="product images"></a>
                                                    </div>
                                                    <div class="htc__list__details" style="width: 154%;">
                                                        <h2><a href=href="product-details.php?id=<?php echo $list['id']; ?>&cat=<?php echo $list['category_id']; ?>">
                                                        <?php echo $list['name']; ?> </a></h2>
                                                        <ul  class="pro__prize">
                                                            <li class="old__prize">$<?php echo $list['mrp']; ?></li>
                                                            <li>$<?php echo $list['price']; ?></li>
                                                        </ul>
                                                        <ul class="rating">
                                                            <li><i class="icon-star icons"></i></li>
                                                            <li><i class="icon-star icons"></i></li>
                                                            <li><i class="icon-star icons"></i></li>
                                                            <li class="old"><i class="icon-star icons"></i></li>
                                                            <li class="old"><i class="icon-star icons"></i></li>
                                                        </ul>
                                                        <p><?php echo $list['description']; ?></p>
                                                        <div class="fr__list__btn">
                                                            <a class="fr__btn" href="cart.php" onclick="add_cart('<?php echo $list['id']; ?>','add');">Add To Cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                        <?php }
                                        } else {
                                            echo "<h1 style='margin: 121px;'>No Product found</h1>";}?>
                                                <!-- End List Product -->
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Product View -->
                        </div>
                        
                    </div>
                    <div class="col-lg-3 col-lg-pull-9 col-md-3 col-md-pull-9 col-sm-12 col-xs-12 smt-40 xmt-40">
                        <div class="htc__product__leftsidebar">
                           <!-- Start Best Sell Area -->
                           <div class="htc__recent__product">
                                <h2 class="title__line--4">best seller</h2>
                                <div class="htc__recent__product__inner">

                                   <?php while ($bs = mysqli_fetch_assoc($best_saler)) { ?>
                                    <div class="htc__best__product">
                                        <div class="htc__best__pro__thumb">
                                            <a href="product-details.php?id=<?php echo $bs['id']; ?>&cat=<?php echo $bs['category_id']; ?>">
                                                <img src="admin/media/product/<?php echo $bs['img']; ?>" alt="small product">
                                            </a>
                                        </div>
                                        <div class="htc__best__product__details">
                                            <h2><a href="product-details.php?id=<?php echo $bs['id']; ?>&cat=<?php echo $bs['category_id']; ?>"><?php echo ($bs['name']); ?></a></h2>
                                            <ul class="rating">
                                                <li><i class="icon-star icons"></i></li>
                                                <li><i class="icon-star icons"></i></li>
                                                <li><i class="icon-star icons"></i></li>
                                                <li class="old"><i class="icon-star icons"></i></li>
                                                <li class="old"><i class="icon-star icons"></i></li>
                                            </ul>
                                            <ul  class="pro__prize">
                                                <li class="old__prize">$<?php echo ($bs['mrp']); ?></li>
                                                <li>$<?php echo ($bs['price']); ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                   <?php } ?>
                                </div>
                            </div>
                            <!-- End Best Sell Area -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Grid -->
        <!-- Start Brand Area -->
        <div class="htc__brand__area bg__cat--4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ht__brand__inner">
                            <ul class="brand__list owl-carousel clearfix">
                                <li><a href="#"><img src="images/brand/1.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/2.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/3.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/4.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/5.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/5.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/1.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/2.png" alt="brand images"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Brand Area -->
        <!-- Start Banner Area -->
        <div class="htc__banner__area">
            <ul class="banner__list owl-carousel owl-theme clearfix">
                <li><a href="product-details.html"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/3.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/4.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/5.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/6.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
            </ul>
        </div>
        <?php
      include ('partials/footer.php');
     ?>

     <?php  
     include ('partials/modal.php');
     include ('partials/modalJs.php');?>
    <script>
  // sorting product
  function sort_product_drop(){
   var sort_product_id = jQuery('#sort_product_id').val();
   window.location.href="<?php echo $cat_url; ?>?id="+<?php echo $id;?>+"&sort="+sort_product_id;
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