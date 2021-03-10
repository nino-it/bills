<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <!-- bill output -->
        <div class="modal-body">
        </div>
    </div>

</div>
<script>
$(document).ready(function() {
    $(".preview").click(function() {
        var billId = $(this).attr('value');
        $.ajax({
            type: 'POST',
            url: '/bills/admin/modal.php',
            data: {
                billId: JSON.stringify(billId)
            },
            success: function(data) {
                $('.modal-body').html(data);
                $('#myModal').css('display', 'block');
            }
        });
    });
});
</script>

<script src="src/modal.js"></script>