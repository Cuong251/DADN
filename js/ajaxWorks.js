function showIotItem() {
    $.ajax({
        url: "/DADN/UI/PHP/viewDevices.php",
        method: "POST",
        data: '{record:1}',
        success:function(data) {
            $('.allContent-section').html(data); 
        }
    });
}
function addItems() {
    $.ajax({
        url: "/DADN/IO_connect/add_device.php",
        method: "POST",
        data: '{record:1}',
        success:function(data) {
            $('.allContent-section').html(data); 
        }
    });

}
function showUserProfile(){  
    $.ajax({
        url:"/DADN/UI/PHP/userProfile.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function showHouse(){  
    $.ajax({
        url:"/DADN/UI/PHP/housestate.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function search(id){
    $.ajax({
        url:"./controller/searchController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.eachCategoryProducts').html(data);
        }
    });
}

function submitData(action) {
    if (confirm('Are you sure want to add this device?') == true) {
        var frm = $(document).ready(function() {
            var data = {
                action : action,
                device_name: $("#device_name").val(),
                feed_name: $("#feed_name").val(),
                room_id: $("#room_id").val(),
                sensor_id: $("#sensor_id").val(),
            }; 
            $.ajax({
                url: '/DADN/IO_connect/function.php', 
                type: 'post', 
                data: data, 
                success: function(response) {
                    alert(response); 
                    if (response == "Added Successfully") {
                        $("#"+action).css("display","none");
                    }
                }
            }); 
        });
    }
}
function del(action) {
    if (confirm('Are you sure to delete this device?') == true) {
    $(document).ready(function() {
        var data = {
            action : action,
            name: $("#device_name").val(),
            type: $("#feed_name").val(),
            room: $("#room_id").val(),
            house: $("#sensor_id").val(),
        }; 
        $.ajax({
            url: '/DADN/IO_connect/function.php', 
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
}
function search(action) {
    $(document).ready(function() {
        $("#live_search").keyup(function(){
            var input = $(this).val();
            if (input != ""){
                $.ajax ({
                    url : "/DADN/IO_connect/searchDevices.php",
                    method: "POST", 
                    data: {input:input}, 

                    success: function (data){
                        $("#searchresult").html(data); 
                        $("#searchresult").css("display", "block"); 
                    }
                })
            }
            else {
                $("#searchresult").css("display", "none"); 
            }
        })
    })
}