
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