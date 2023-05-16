
<!-- Database connection -->
<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'smart_home';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<h1 style ="text-align: center;">New IoT devices</h1>
<form method="post" id = "newIoTDeviceInfo">
        <div class = "row mb-3">
            <label for = "device_name" class = "col-sm-3 col-form-label"> Device Name </label>
            <div class = "col-sm-6">
                <input type="text" id="device_name" name="device_name" class = "form-control" required> 
            </div>
        </div>

        <div class = "row mb-3">
            <label for="feed_name" class = "col-sm-3 col-form-label">Feed Name </label>
            <div class = "col-sm-6">
                <input type="text" id="feed_name" name="feed_name" class = "form-control" required>
            </div>
        </div>

        <div class = "row mb-3">
            <label for="room_id" class = "col-sm-3 col-form-label" >Room</label>
                <div class = "col-sm-6">
                        <select class="form-control" id="room_id" name="room_id" required>
        <?php
        // Get all rooms from database
        $sql = "SELECT r.id AS room_id, r.name AS room_name, h.name AS house_name FROM rooms r JOIN houses h ON r.house_id = h.id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["room_id"] . "'>" . $row["house_name"] . " - " . $row["room_name"] . "</option>";
            }
        }
        ?>
    </select>   
            </div>
        </div>
    <div class = "row mb-3">
            <label for="sensor_id" class = "col-sm-3 col-form-label">Sensor</label>
            <div class = "col-sm-6">
                <select class = "form-control" id="sensor_id" name="sensor_id" required>
        <?php
        // Get all sensors from database
        $sql = "SELECT id, name FROM sensors";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
            }
        }
        ?>
    </select>
        </div>
    </div>

    <div class = "row mb-3" style = "text-align:center;">
                <div class = "offset-sm-3 col-sm-3 d-grid">
                        <input type="button" onclick="submitData('insert');" class="btn btn-outline-primary" value="Add Device">
                </div>

                <div class = "col-sm-3 d-grid">    
                 <a class="btn btn-outline-primary" href = "/DADN/UI/PHP/IoTManagerMain.php" role = "button"> Back</a>
                </div>
    </div>
    </form>
<?php $conn->close();?>