<?php


include 'modules/signin.php';
  $sql ="SELECT * FROM `product` where status = 1 order by id desc LIMIT 4 ";
  $res= mysqli_query($conn,$sql);
  $data = array();
  while ($row = mysqli_fetch_assoc($res)) {
      $data[]=$row;
  }
  $sql ="SELECT * FROM `product` where status = 1 order by id asc LIMIT 8 ";
  $res= mysqli_query($conn,$sql);
  $all = array();
  while ($row = mysqli_fetch_assoc($res)) {
      $all[]=$row;
  }



?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Asbab - eCommerce HTML5 Templatee</title>
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
    <!-- include header  -->
    <?php  require_once ('partials/header.php'); ?>


        
        <div 
         class="slider__container slider--one bg__cat--3">
            <div class="slide__container slider__activation__wrap owl-carousel" >
                
               
                <div class="single__slide animation__style01 slider__fixed--height"
                style="background: url(img/banners/winter2.jpg) right;width: 104%;height: 50%;background-size: cover;"
                >
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2 style="color:white ;">collection 2023</h2>
                                        <h1 style="color:white ;">WINTER SPACIALS</h1>
                                        <div class="cr__btn">
                                            <a href="shop.php">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb"></div>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="single__slide animation__style01 slider__fixed--height"
                style="background: url(img/banners/banner2.jpg) right;width: 104%;height: 50%;background-size: cover;"
                >
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2>collection 2023</h2>
                                        <h1>NICE CLOTHES</h1>
                                        <div class="cr__btn">
                                            <a href="shop.php">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div  class="single__slide animation__style01 slider__fixed--height"
                style="background: url(img/banners/banner1.jpg) right;width: 104%;height: 50%;background-size: cover;"
                >
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2>collection 2023</h2>
                                        <h1>NICE WATCHES</h1>
                                        <div class="cr__btn">
                                            <a href="shop.php">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="single__slide animation__style01 slider__fixed--height"
                style="background: url(img/banners/banner5.jpg) right;width: 104%;height: 50%;background-size: cover;"
                >
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2>Get 30% Discount</h2>
                                        <h1>RESGISTER NOW</h1>
                                        <div class="cr__btn">
                                            <a href="login.php">Sigup</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb"></div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div> 
      
        <!-- Start Category Area -->
        <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">New Arrivals</h2>
                            <p>But I must explain to you how all this mistaken idea</p>
                        </div>
                    </div>
                </div>
                  <!-- PRODUCT-->
            
                <div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30">
                            <!-- Start Single Category -->
                              <!-- PRODUCT-->
                                <?php $get_product = $data;

                                foreach ($get_product as $list) {

                                ?>
                           <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="product-details.php?id=<?php echo $list['id']; ?>&cat=<?php echo $list['category_id']; ?>">
                                            <img src="admin/media/product/<?php echo $list['img']; ?>" alt="product images">
                                        </a>
                                    </div>
                                    <div class="fr__hover__info">
                                        <ul class="product__action">
                                            <li><a href="javascript:void(0)" onclick="wishlist('<?php echo $list['id']; ?>');"><i class="icon-heart icons"></i></a></li>

                                            <li><a href="javascript:void(0)" onclick="add_cart('<?php echo $list['id']; ?>','add');"><i class="icon-handbag icons"></i></a></li>

                                            <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="fr__product__inner">
                                        <h4><a href="product-details.html"><?php echo $list['name']; ?></a></h4>
                                        <ul class="fr__pro__prize">
                                            <li class="old__prize">$<?php echo $list['mrp']; ?></li>
                                            <li>$<?php echo $list['price']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                           
                            </section>
        <!-- Start Product Area -->
        <section class="ftr__product__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">Best Seller</h2>
                            <p>But I must explain to you how all this mistaken idea</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product__wrap clearfix">
                        <!-- Start Single Category -->
                        <?php $get_all_product = $all;

                        foreach ($get_all_product as $list) {

                        ?>
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="product-details.php?id=<?php echo $list['id']; ?>&cat=<?php echo $list['category_id']; ?>">
                                        <img src="admin/media/product/<?php echo $list['img']; ?>" alt="product images">
                                    </a>
                                </div>
                                <div class="fr__hover__info">
                                    <ul class="product__action">
                                        <li><a href="javascript:void(0)" onclick="wishlist('<?php echo $list['id']; ?>');"><i class="icon-heart icons"></i></a></li>

                                        <li><a href="javascript:void(0)" onclick="add_cart('<?php echo $list['id']; ?>','add');"><i class="icon-handbag icons"></i></a></li>

                                        <li><a href="#" ><i class="icon-shuffle icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="fr__product__inner">
                                    <h4><a href="product-details.html"><?php echo $list['name']; ?></a></h4>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize">$<?php echo $list['mrp']; ?></li>
                                        <li>$<?php echo $list['price']; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Category -->
                       <?php }?>
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
 
    </div>
    <script>
     var currentIndex = 0 ;
     var slides = $(".carousel .slide");
     var slideCount = slides.length;
     function showSlide(index)
     {
         slides.hide();
         slides.eq(index).show();
     }
     function nextSlide()
     {
         currentIndex ++ ;
         if(currentIndex >= slideCount)
         {
             currentIndex = 0;
         }
         showSlide(currentIndex);
     }
     $(document).ready(function(){
         showSlide(currentIndex);
         setInterval(nextSlide(),3000);
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
    <!-- Waypoints.min.js. -->
    <script src="js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="js/main.js"></script>

</body>

</html>