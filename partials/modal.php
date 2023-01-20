<?php $showEror = false;

$cart_total = 0;
?>



<!-- search modal  -->
<div id="search-modal">
  <div id="search-modal-form">
    <section>
      <section class="">
        <div class="container p-0">
          <div class="row gy-3">
            <div class="col-lg-3">
              <h5 class="text-uppercase">Let's be <span style="color:#c43b68;"> friends</span> !</h5>
              <p class="text-sm text-muted mb-0">Search your favorite product.</p>
            </div>
            <div class="col-lg-9">
              <form action="search.php" method="get">
                <div class="input-group">
                  <input style="width: 255%;height: 46px;" class="form-control form-control-lg" type="text" name="str"
                    placeholder="Search product .. " required>
                </div>
                <button style="width: 116px!important;
 height: 46px!important;
    margin-left: 58%!important;
    margin-top: -46px;" type="submit" class="fv-btn"> Search </button>

              </form>
            </div>
          </div>
        </div>
      </section>
  </div>
  <div id="search-close-btn">X</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

</div>
<!-- login modal  -->
<div>
  <div style=" background: rgba(0,0,0,0.7);
    position: fixed;
    left: 0;
    top:0;
    width: 100%;
    height: 100%;
    z-index: 100;
    display: none;" id="login-modal">
    <div style="width:550px;
    margin: 30px auto;
    position: relative;
    padding: 15px;
    cursor:pointer;">
      <section style="background-color: rgba(0, 0, 0, 0);!important;border:solid rgba(0, 0, 0, 0);">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
          <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center ">
              <div style=" background: white;width: 45%;padding-bottom: 15px;border-radius: 10px;"
                class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card" style="border-radius: 15px;">
                  <div id="login-close-btn" style="margin-left: 90%!important;margin-top: 13px;">X

                  </div>
                  <h1 style="margin: 63px;" class="text-center">Sign<span class="text-danger">In</span></h1>
                  <div class="col-xs-12">
                    <form id="contact-form" action="#" method="post">
                      <div class="single-contact-form">
                        <div class="contact-box name">
                          <input type="email" name="username" placeholder="Your Email*" style="width:90%">
                        </div>
                      </div>
                      <div class="single-contact-form">
                        <div class="contact-box name">
                          <input type="password" name="password" placeholder="Your Password*" style="width:90%">
                        </div>
                      </div>

                      <div class="contact-btn">
                        <button style="width: 97%;" type="submit" class="fv-btn">Login</button>

                        <p style="margin-top:7px ;" class="text-center text-muted mt-4 mb-0">Want to create an account?
                          <a href="login.php" class="fw-bold text-body"><u>Sigin up here</u></a>
                        </p>
                      </div>
                    </form>
                    <div class="form-output">
                      <p class="form-messege"><?php echo $showEror; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</section>
</div>
</div>
</div>
</div>
</div>
</div>




            <!-- Start Cart Panel -->
            <div class="shopping__cart">
                <div class="shopping__cart__inner">
                    <div class="offsetmenu__close__btn">
                        <a onclick="reload();"><i class="zmdi zmdi-close"></i></a>
                    </div>
                    
                    <?php
                if (isset($_SESSION['cart']) && $_SESSION['cart'] != '') {



                  $cart_total = 0;
                  foreach ($_SESSION['cart'] as $key => $val) {

                    $sql = "SELECT * FROM `product` where id = $key";
                    $res = mysqli_query($conn, $sql);
                    $productArr = array();
                    while ($row = mysqli_fetch_assoc($res)) {
                      $productArr[] = $row;
                    }
                    $pname = $productArr[0]['name'];
                    $price = $productArr[0]['price'];$img = $productArr[0]['img'];   $qty = $val['qty'];
                    $cart_total = $cart_total + ($price * $qty);




                ?>
               
                    <div  class="shp__cart__wrap">
                        <div id="remove"  class="shp__single__product">
                            <div class="shp__pro__thumb">
                            <?php if ($_SESSION['cart'] != true) {
                      echo '<b>No items found in add to cart</b>';
                    } else { ?>
                                <a href="#">
                                    <img src="admin/media/product/<?php echo $img; ?>" alt="product images">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="product-details.html"><?php echo $pname; ?></a></h2>
                                <span class="quantity">QTY: <?php echo $qty; ?></span>
                                <span class="shp__price">$<?php echo $price; ?></span>
                            </div>
                            <div class="remove__btn">
                                <a href="javascript:void(0)" id="delicon" onclick="manage_cart('<?php echo $key; ?>','remove');"><i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>
                        <?php }}}?>
                        
                    <ul class="shoping__total">
                        <li class="subtotal">Subtotal:</li>
                        <li class="total__price">$<?php echo $cart_total; ?></li>
                    </ul>
                    
                    <ul class="shopping__btn">
                        <li><a href="cart.html">View Cart</a></li>
                        <li class="shp__checkout"><a href="checkout.html">Checkout</a></li>
                    </ul>
                </div>
            </div>
                   
        </div>


<script type="text/javascript" src="js/jquery.js"></script>

<script type="text/javascript">
  $(document).ready(function () {
    function loadTable() {
      $.ajax({
        url: "ajax_cart.php",
        type: "POST",
        success: function (data) {
          $("#table-data").html(data);
        }
      })
    }
    loadTable();



  });
  $('#close-btn').on('click', function () {
    window.location.reload();
  })
</script>