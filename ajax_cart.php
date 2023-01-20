<?php 
session_start();
include 'partials/config.inc.php';
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
     $pname=$productArr[0]['id'];
     $price=$productArr[0]['price'];
     $mrp=$productArr[0]['mrp'];
     $img=$productArr[0]['img'];
     $qty=$val['qty'];
     $cart_total=$cart_total+($price*$qty);
    
     $output=' 
     <tr>
       <th class="ps-0 py-3 border-0" scope="row">
         <div class="d-flex align-items-center"><a class="reset-anchor d-block animsition-link" href="detail.php"><img src="admin/media/product/'.$productArr[0]['img'].'"  width="70"/></a>
           <div class="ms-3"><strong class="h6"><a class="reset-anchor animsition-link" href="detail.php">'. $productArr[0]['name'] .'</a></strong></div>
         </div>
       </th>
       <td class="p-3 align-middle border-0">
         <p class="mb-0 small">'. $productArr[0]['price'] .'</p>
       </td>
       <td class="p-3 align-middle border-0">
         <div class="border d-flex align-items-center justify-content-between px-3"><span class="small text-uppercase text-gray headings-font-family">'. $val['qty'] .'</span>
           <div class="quantity">
             <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
             <input class="form-control form-control-sm border-0 shadow-0 p-0" id="update" type="number" value="'.$val['qty'] .'"/>
             <button class="inc-btn p-0"><i class="fas fa-caret-right"></i>
           
           
           </button>
           <a  href="javascript:void(0)" onclick="manage_cart("'. $productArr[0]['id'] .'","update");">update</a>

             <br>  &nbsp
           </div>
         </div>
       </td>
       <td class="p-3 align-middle border-0">
         <p class="mb-0 small">'. $productArr[0]['mrp'] .'</p>
       </td>
       <td class="p-3 align-middle border-0"><a class="reset-anchor" href="javascript:void(0)" onclick="manage_cart("'. $productArr[0]['id'] .'","remove");"><i class="fas fa-trash-alt small text-muted"></i></a></td>
     </tr>';
     echo $output;
    }
    mysqli_close($conn);
    

}else {
    echo "<h5>No record found</h5>";
 }



?>