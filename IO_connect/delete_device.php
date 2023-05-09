<?php
// Database connection
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'smart_home';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if (isset($_POST["submit"])) {
    // Get selected device IDs
    $device_ids = $_POST["device_ids"];

    // Delete sensor readings for selected devices
    $stmt = $conn->prepare("DELETE FROM sensor_readings WHERE device_id = ?");
    foreach ($device_ids as $device_id) {
        $stmt->bind_param("i", $device_id);
        $stmt->execute();
    }
    $stmt->close();

    // Delete selected devices from database
    $stmt = $conn->prepare("DELETE FROM devices WHERE id = ?");
    foreach ($device_ids as $device_id) {
        $stmt->bind_param("i", $device_id);
        if ($stmt->execute()) {
            echo "Device with ID " . $device_id . " deleted successfully<br>";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
    $stmt->close();
}

?>

<h1>Delete Devices</h1>

<form method="post">
    <?php
    // Get all devices from database
    $sql = "SELECT d.id AS device_id, d.name AS device_name, r.name AS room_name FROM devices d JOIN rooms r ON d.room_id = r.id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='device-block'>";
            echo "<input type='checkbox' id='device_" . $row["device_id"] . "' name='device_ids[]' value='" . $row["device_id"] . "'>";
            echo "<label for='device_" . $row["device_id"] . "'>" . $row["device_name"] . " in " . $row["room_name"] . "</label>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }
    ?>

    <input type="submit" name="submit" value="Delete Selected Devices">
</form>

<style>
.device-block {
    margin: 10px;
}
</style>

<?php
$conn->close();
?>