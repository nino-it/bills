<script>
$(document).ready(function() {
    $("#items").keyup(function() {
        var query = $(this).val();
        if (query != "") {
            $.ajax({
                url: '../admin/search.php',
                method: 'POST',
                data: {
                    query: query
                },
                success: function(data) {

                    $('#output').html(data);
                    $('#output').css('display', 'block');

                    // click LI
                    $("#output li").click(function() {
                        id = $(this).attr("data-value");
                        name = $(this).html();
                        $("#items").val(name);
                        $("#items").attr('value', id); //add value=id
                        $('#output').css('display', 'none'); //hide #output
                        $('#output ul').remove(); //remove
                    });

                    $("#items").focusin(function() {
                        $('#output').css('display', 'block');
                    });
                    // if no data is returned
                    if (data == "") {
                        $('#output').css('display', 'none');
                    }
                }
            });
        } else {
            $('#output').css('display', 'none');
        }
    });
});
</script>