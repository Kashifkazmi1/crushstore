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