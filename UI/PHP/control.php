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

// Adafruit IO credentials

// Get all devices with sensor type "button" or sensor name "Two-mode text"
$sql = "SELECT d.name AS device_name, r.name AS room_name, d.feed_name AS feed_name, s.name AS sensor_name FROM devices d JOIN sensors s ON d.sensor_id = s.id JOIN rooms r ON d.room_id = r.id WHERE s.type = 'button' OR s.name = 'Two-mode text'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

        // Get current value from Adafruit IO
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://io.adafruit.com/api/v2/" . ADAFRUIT_IO_USERNAME . "/feeds/" . $row["feed_name"] . "/data/last");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "X-AIO-Key: " . ADAFRUIT_IO_KEY
        ));
        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response);
        $value = $data->value;

        // Display button with current status

    }
} else {
}

$conn->close();

?>

