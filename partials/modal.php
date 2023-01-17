<?php $showEror = false; ?>
 

<!-- modal  -->
<div id="modal">
    <div id="modal-form">
        <section class="py-5">
        <h2 class="h5 text-uppercase mb-4">Shopping cart</h2>
          <div class="row">
            <div class="col-lg-12 mb-4 mb-lg-0">
              <!-- CART TABLE-->
              <div class="table-responsive mb-4">
                <table class="table text-nowrap">
                  <thead class="bg-light">
                    <tr>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Product</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Price</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Quantity</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Total</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase"></strong></th>
                    </tr>
                  </thead>
                  <tbody class="border-0">
                   <?php 
                if(isset($_SESSION['cart'])&&$_SESSION['cart']!=''){

                
                     
                   $cart_total=0;
                   foreach ($_SESSION['cart'] as $key => $val) { 
                     
                     $sql ="SELECT * FROM `product` where id = $key";
                     $res= mysqli_query($conn,$sql);
                     $productArr = array();
                     while ($row = mysqli_fetch_assoc($res)) {
                      $productArr[] = $row;
                     }
                    $pname=$productArr[0]['name'];
                    $price=$productArr[0]['price'];
                    $mrp=$productArr[0]['mrp'];
                    $img=$productArr[0]['img'];
                    $cat=$productArr[0]['category_id'];
                    $qty=$val['qty'];
                    $cart_total=$cart_total+($price*$qty);

                    
                 
                    
  ?>
                     
                    <tr id="re">
                      <th class="ps-0 py-3 border-0" scope="row">
                        <?php if($_SESSION['cart']!= true)
                        {
                          echo '<b>No items found in add to cart</b>';
                        }else{?>

                        <div class="d-flex align-items-center"><a class="reset-anchor d-block animsition-link" href="detail.php?id=<?php echo $key; ?>&cat=<?php echo $cat; ?>"><img src="admin/media/product/<?php echo $img; ?>"  width="70"/></a>
                          <div class="ms-3"><strong class="h6"><a class="reset-anchor animsition-link" href="detail.php?id=<?php echo $key; ?>&cat=<?php echo $cat;?>"><?php echo $pname; ?></a></strong></div>
                        </div>
                      </th>
                      <td class="p-3 align-middle border-0">
                        <p class="mb-0 small"><?php echo $price; ?></p>
                      </td>
                      <td class="p-3 align-middle border-0">
                        <div class="border d-flex align-items-center justify-content-between px-3"><span class="small text-uppercase text-gray headings-font-family"><?php echo $qty; ?></span>
                          <div class="quantity">
                            <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                            <input class="form-control form-control-sm border-0 shadow-0 p-0" id="update" type="number" value="<?php echo $qty; ?>"/>
                            <button class="inc-btn p-0"><i class="fas fa-caret-right"></i>
                          
                          
                          </button>
                          <a  href="javascript:void(0)" onclick="manage_cart('<?php echo $key; ?>','update');">update</a>

                            <br>  &nbsp
                          </div>
                        </div>
                      </td>
                      <td class="p-3 align-middle border-0">
                        <p class="mb-0 small"><?php echo $mrp; ?></p>
                      </td>
                      <td class="p-3 align-middle border-0"><a class="reset-anchor" href="javascript:void(0)" onclick="manage_cart('<?php echo $key; ?>','remove');"><i class="fas fa-trash-alt small text-muted"></i></a></td>
                    </tr>
                  <?php }} ?>
                  <?php }else{
                      $cart_total = '';
                    } ?>
                  
                  

                  </tbody>
                </table>
              </div>
              <!-- CART NAV-->
              <div class="bg-light px-4 py-3">
                <div class="row align-items-center text-center">
                  <div class="col-md-6 mb-3 mb-md-0 text-md-start"><a class="btn btn-link p-0 text-dark btn-sm" href="shop.php"><i class="fas fa-long-arrow-alt-left me-2"> </i>Continue shopping</a></div>
                  <div class="col-md-6 text-md-end"><a class="btn addtocart btn-sm" href="checkout.php">Procceed to checkout<i class="fas fa-long-arrow-alt-right ms-2"></i></a></div>
                </div>
              </div>
            </div>
            <!-- ORDER TOTAL-->
            <div class="col-lg-12">
              <div class="card border-0 rounded-0 p-lg-4 bg-light">
                <div class="card-body">
                  <h5 class="text-uppercase mb-4">Cart total</h5>
                  <ul class="list-unstyled mb-0">
                    <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Subtotal</strong><span class="text-muted small"><?php echo $cart_total; ?></span></li>
                    <li class="border-bottom my-2"></li>
                    <li class="d-flex align-items-center justify-content-between mb-4"><strong class="text-uppercase small font-weight-bold">Total</strong><span><?php echo $cart_total; ?></span></li>
                    <li>
                      <form action="#">
                        <div class="input-group mb-0">
                          <input class="form-control" type="text" placeholder="Enter your coupon">
                          <button class="btn addtocart btn-sm w-100 mt-2" type="submit"> <i class="fas fa-gift me-2"></i>Apply coupon</button>
                        </div>
                      </form>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

        </section>
    </div>
    <div id="close-btn">X</div>
</div>
</div>





<!-- search modal  -->
<div id="search-modal">
    <div id="search-modal-form">
        <section>
            <section class="">
                <div class="container p-0">
                    <div class="row gy-3">
                        <div class="col-lg-3">
                            <h5 class="text-uppercase">Let's be <span style="color:#1D7A8C;"> friends</span> !</h5>
                            <p class="text-sm text-muted mb-0">Nisi nisi tempor consequat laboris nisi.</p>
                        </div>
                        <div class="col-lg-9">
                            <form action="search.php" method="get">
                                <div class="input-group">
                                    <input class="form-control form-control-lg" type="text" name="str"
                                        placeholder="Search product .. " required>
                                    <button style="  width: 116px!important;height: 42px!important;margin-left: 1px!important;" class="search-btn addtocart " type="submit"> Search </button>
                                </div>
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
                            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card" style="border-radius: 15px;">
                                    <div id="login-close-btn" style="margin-left: 90%!important;margin-top: 13px;">X
                                    </div>


                                    <div class="card-body p-5">

                                        <h2 class=" text-center mb-5 modal-header">Sign In</h2>

                                        <form action="index.php" method="post">


                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form3Example3cg">Your Email</label>
                                                <input type="text" name="username" id="form3Example3cg"
                                                    class="form-control text-dark form-control-lg" required />

                                            </div>

                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form3Example4cg">Password</label>
                                                <input type="password"  name="password" id="form3Example4cg"
                                                    class="form-control text-dark form-control-lg" required />
                                                <?php if ($showEror == true) {
                          echo "<span class='text-danger'> Password do not match try again </span> ";
                        } ?>

                                            </div>



                                            <div class="d-flex justify-content-center">
                                                <button type="submit" name="signin"
                                                    class="btn btn-sm text-light color-active-them">Sign
                                                    In</button>
                                            </div>

                                            <p class="text-center text-muted mt-5 mb-0">Want to create an account? <a
                                                    href="signup.php" class="fw-bold text-body"><u>Sigin up here</u></a>
                                            </p>

                                        </form>

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
<!-- login modal  -->


   


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    function loadTable() {
        $.ajax({
            url: "ajax_cart.php",
            type: "POST",
            success: function(data) {
                $("#table-data").html(data);
            }
        })
    }
    loadTable();



});
$('#close-btn').on('click',function(){
 window.location.reload();
})
</script>
