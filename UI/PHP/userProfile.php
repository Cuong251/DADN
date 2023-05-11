<form method = "post">
     <h3 style ="text-align: center;">Thông tin người dùng</h3> 
            <input type = "hidden" name = "MSHS" value = "">
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label"> Họ và tên lót </label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-control" placeholder = "Phan Trọng" name = "HO_VA_TENLOT" value = "Nguyễn Văn" readonly>
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label"> Tên </label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-control" placeholder = "Nhân" name = "TEN" value = "A" readonly>
                </div>
            </div> 
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label"> Ngày sinh </label>
                <div class = "col-sm-6">
                    <input type = "date" class = "form-control" name = "Bdate" value = "01/01/2023" readonly>
                </div>
            </div>  
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label"> Địa chỉ </label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-control" placeholder = "Quận 10" name = "Address" value = "Quận 10" readonly>
                </div>
            </div> 
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label"> Giới tính </label>
                <div class = "col-sm-6">
                <input id="Gender" input type = "select"  class = "form-control" name = "Sex" value = "Nam" readonly>
                </div>
            </div>   


            <div class = "row mb-3">
                <div class = "offset-sm-3 col-sm-3 d-grid">
                        <button type = "submit"  class = "btn btn-outline-primary"> Submit
                </div>

                <div class = "col-sm-3 d-grid">    
                 <a class="btn btn-outline-primary" href = "/DADN/UI/PHP/IoTManagerMain.php" role = "button"> Cancel</a>
                </div>
                
            </div> 
    </div>
        </form>
