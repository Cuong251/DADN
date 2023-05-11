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
function showAddItems() {
    $.ajax({
        url: "/DADN/UI/PHP/viewDevices.php",
        method: "POST",
        data: '{record:1}',
        success:function(data) {
            
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
