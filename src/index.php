<script>
$(document).ready(function() {

    $("#btn").click(function() {
        $.ajax({
            type: 'POST',
            url: '/bills/src/ajax.php',
            data: {
                myData: JSON.stringify(allProducts)
            },
            success: function(data) {
                console.log(data);
            }
        });
    });
});
</script>