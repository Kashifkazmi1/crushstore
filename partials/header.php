  <?php
  
   include('partials/config.php'); 
   include 'partials/add_to_cart.php'; 
   $sql = "SELECT * FROM `categories` where status = 1 ORDER BY `category_name` ASC";
   $cat_res = mysqli_query($conn,$sql);

   
  $obj = new add_to_cart();
  $totalProduct = $obj->totalProduct();

  //echo $totalProduct;
  
   ?>
   <!-- Start Header Style -->
   <header id="htc__header" class="htc__header__area header--one">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                                <div class="logo">
                                     <a href="index.php"><img src="img/bebo-logo.png" alt="logo images"> </a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="index.php">Home</a></li>
                                        <li class="drop"><a href="shop.php">categories</a>
                                            <ul style="width: 443px!important;text-align: center;" class="dropdown mega_dropdown">
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="product-grid.php">Product Categories</a>
                                                    <ul  class="mega__item">
                                                        <?php 
                                                        while($list = mysqli_fetch_assoc($cat_res)){
                                                            ?>
                                                        <li><a href="categories.php?id=<?php echo $list['id']; ?>"><?php echo $list['category_name']; ?></a></li>
                                                    <?php } ?>
                                                       
                                                        
                                                    </ul>
                                                    
                                                </li>
                                               
                                            </ul>
                                            
                                        </li>
                                        <li class="drop"><a href="Shop.php">shop</a>
                                            
                                        <li class="drop"><a href="#">Pages</a>
                                            <ul class="dropdown">
                                            <li><a href="wishlist.php">wishlist</a></li>
                                            <li><a href="order_detail.php">Oder Details</a></li>

                                                <li><a href="blog.php">Blog</a></li>
                                                <li><a href="cart.php">Cart page</a></li>
                                                <li><a href="contact.php">contact us</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.php">contact</a></li>
                                    </ul>
                                </nav>

                                <div class="mobile-menu clearfix visible-xs visible-sm">
                                    <nav id="mobile_dropdown">
                                        <ul>
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="blog.php">shop</a></li>
                                            <li><a href="#">pages</a>
                                                <ul>
                                                
                                                    <li><a href="blog.php">Blog</a></li>
                                                    <li><a href="blog-details.php">Blog Details</a></li>
                                                    <li><a href="cart.php">Cart page</a></li>
                                                    <li><a href="checkout.php">checkout</a></li>
                                                    <li><a href="contact.php">contact</a></li>
                                                    <li><a href="product-grid.php">product grid</a></li>
                                                    <li><a href="product-details.php">product details</a></li>
                                                    <li><a href="wishlist.php">wishlist</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">categories</a>
                                                <ul>
                                                <?php 
                                                 $sql = "SELECT * FROM `categories` where status = 1 ORDER BY `category_name` ASC";
                                                 $cat_res = mysqli_query($conn,$sql);
                                                        while($row = mysqli_fetch_assoc($cat_res)){
                                                            ?>
                                                        <li><a href="shop.php?<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></a></li>
                                                    <?php } ?>
                                                       
                                                    
                                                </ul>
                                            </li>
                                            <li><a href="contact.php">contact</a></li>
                                        </ul>
                                    </nav>
                                </div>  
                            </div>
                            <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                <div class="header__right">
                                    <div  class="header__search ">
                                    <a class="search-btn" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                                    </div>
                                    <?php if(isset($_SESSION['username'])){
                                        echo '<div class="header__account ">
                                        <a  href="my_order.php" ><i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                                    </div> <div class="header__account ">
                                        <a  href="partials/logout.php" >Logout</a>
                                    </div>
                                    
                                    ';
                                    }else{
                                      
                                    echo '<div class="header__account user-btn">
                                    <a class="user-btn" href="#" ><i class="icon-user icons"></i></a>
                                </div>';
                                    } 
                                    ?>
                                   

                                   
                                   <div class="htc__shopping__cart">
                                        <a class="cart__menu" href="#"><i class="icon-handbag icons"></i></a>
                                        <a href="#"><span class="htc__qua"><?php echo $totalProduct; ?></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Area -->
        