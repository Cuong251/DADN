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
    // Get form data
    $device_name = $_POST["device_name"];
    $feed_name = $_POST["feed_name"];
    $room_id = $_POST["room_id"];
    $sensor_id = $_POST["sensor_id"];

    // Insert new device into database
    $stmt = $conn->prepare("INSERT INTO devices (name, feed_name, room_id, sensor_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $device_name, $feed_name, $room_id, $sensor_id);
    if ($stmt->execute()) {
        echo "New device added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

?>

<h1>Add Device</h1>

<form method="post">
    <label for="device_name">Device Name:</label><br>
    <input type="text" id="device_name" name="device_name"><br>

    <label for="feed_name">Feed Name:</label><br>
    <input type="text" id="feed_name" name="feed_name"><br>

    <label for="room_id">Room:</label><br>
    <select id="room_id" name="room_id">
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
    </select><br>

    <label for="sensor_id">Sensor:</label><br>
    <select id="sensor_id" name="sensor_id">
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
    </select><br>

    <input type="submit" name="submit" value="Add Device">
</form>

<?php
$conn->close();
?>