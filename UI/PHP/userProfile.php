<form method="post">
    <h3 style="text-align: center;">User profile</h3>
    <input type="hidden" name="MSHS" value="">
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label"> First name </label>
        <div class="col-sm-6">
            <input type="text" class="form-control" placeholder="Phan Trọng" name="HO_VA_TENLOT" value="Nguyễn Văn" readonly>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label"> Last name </label>
        <div class="col-sm-6">
            <input type="text" class="form-control" placeholder="Nhân" name="TEN" value="Trọng" readonly>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label"> Birthday </label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="Bdate" value="1/1/2002" readonly>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Address</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" placeholder="Quận 10" name="Address" value="Thủ Đức" readonly>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label"> Gender </label>
        <div class="col-sm-6">
            <input id="Gender" input type="select" class="form-control" name="Sex" value="Nam" readonly>
        </div>
    </div>


    <div class="row mb-3" style="text-align:center;">
        <div class="offset-sm-3 col-sm-3 d-grid">
            <a class="btn btn-outline-primary" style="background:#336BFF;color:white;" href="/DADN/UI/PHP/IoTManagerMain.php" role="button"> Back</a>
        </div>

    </div>
    </div>
</form>