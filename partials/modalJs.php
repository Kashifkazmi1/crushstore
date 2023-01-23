
  <script>

//delete product modal

function manage_cart(pid,type){

$.ajax({
          url:'manage_cart.php',
          type:'post',
          data:'pid='+pid+'&type='+type,
          success:function(result){ 
           $("#remove").fadeOut();
           window.location.reload();
          }
      });
}
     




</script>
  <script>
  // show modal-form 

$(document).on("click",".cart-btn",function(){
  $("#modal").fadeIn('slow');
  
})
//hide-modal
 $("#close-btn").on("click",function(){
   $('#modal').fadeOut('slow');

 })  
 // seacrh 
$(document).on("click",".search-btn",function(){
  $("#search-modal").slideDown('slow');
  
})
//hide-modal
 $("#search-close-btn").on("click",function(){
   $('#search-modal').fadeOut('slow');
 })  
 // login 
$(document).on("click",".user-btn",function(){
  $("#login-modal").slideDown('slow');
  
})
//hide-modal
 $("#login-close-btn").on("click",function(){
  $('#login-modal').fadeOut('slow');
 })  

 $(document).ready(function(){
    $('#hover').mouseenter(function(){
    $('#hover,#hover-link').css("background-color","#06687c" );    
    });
    $('#hover').mouseleave(function(){
    $('#hover,#hover-link').css("background-color","#1D7A8C");    
    });
  });


</script>
   
<script>
  function wishlist(pid){
      

      $.ajax({
          url: 'whishlist_ajax.php',
          type: 'post',
          data: 'pid=' + pid ,
          success: function(result) {
             alert(result);
          }
      });
  }
</script>
<script>

function add_cart(pid, type) {
    var qty = 1;
   


    $.ajax({
        url: 'manage_cart.php',
        type: 'post',
        data: 'pid=' + pid + '&qty=' + qty + '&type=' + type,
        success: function(result) {
            jQuery('.htc__qua').html(result);
            window.location.reload();
        }
    });
}
</script>
<!-- //ajax add to cart  -->
<script>

function modal(pid) {
    
    $.ajax({
        url: 'modal_popup.php',
        type: 'post',
        data: 'pid=' + pid ,
        success: function(data) {
          $('.popup_modal').html(data);
          $('#mod').fadeIn();
        }
    });
}
</script>

<script>

//delete product modal

function manage_cart(pid,type){
if (type=="update") {
var qty=jQuery('#update').val();
var pid;
$.ajax({
          url:'manage_cart.php',
          type:'post',
          data:'pid='+pid+'&qty='+qty+'&type='+type,
          success:function(result){
               window.location.reload();
          }
      });
}
if (type == "remove") {
$.ajax({
          url:'manage_cart.php',
          type:'post',
          data:'pid='+pid+'&qty='+qty+'&type='+type,
          success:function(result){
            
           $("#remove").fadeOut();
            
             
          }
      });
}
     
  }


</script>
<script>
          //ajax sendmessage 

    function manage_cart(pid, type) {
        var qty = jQuery("#qty").val();


        $.ajax({
            url: 'manage_cart.php',
            type: 'post',
            data: 'pid=' + pid + '&qty=' + qty + '&type=' + type,
            success: function(result) {
                jQuery('.htc__qua').html(result);
            }
        });
    }
    </script>
