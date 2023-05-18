<script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
<script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"  ></script>

</script>
<script type="text/javascript">
function submitData(action) {
    $(document).ready(function() {
        var data = {
            action : action,
            name: $("#device_name").val(),
            type: $("#feed_name").val(),
            room: $("#room_id").val(),
            house: $("#sensor_id").val(),
        }; 
        $.ajax({
            url: 'function.php', 
            type: 'post', 
            data: data, 
            success: function(response) {
                alert(response); 
                if (response == "Deleted Successfully") {
                    $("#"+action).css("display","none"); 
                }
            }
        }); 
    });
}
function del(action) {
    $(document).ready(function() {
        var data = {
            action : action,
            name: $("#device_name").val(),
            type: $("#feed_name").val(),
            room: $("#room_id").val(),
            house: $("#sensor_id").val(),
        }; 
        $.ajax({
            url: 'function.php', 
            type: 'post', 
            data: data, 
            success: function(response) {
                alert(response); 
                if (response == "Deleted Successfully") {
                    $("#"+action).css("display","none"); 
                }
            }
        }); 
    });
}
</script>
