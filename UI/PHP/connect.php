<?php
// Define Adafruit IO 
define('ADAFRUIT_IO_USERNAME', 'QliShad');
define('ADAFRUIT_IO_KEY', 'aio_qgzB81HSJ7aAgQOQN0NVUzBExOUl');


// Define database credentials and connect to the database
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'smart_home';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//GET FEED_NAME LIST
$sql = "SELECT feed_name FROM devices";
$result = $conn->query($sql);

$feed_names = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $feed_names[] = $row["feed_name"];
    }
}

// Loop through each feed and retrieve its data from Adafruit IO
foreach ($feed_names as $feed_name) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://io.adafruit.com/api/v2/" . ADAFRUIT_IO_USERNAME . "/feeds/" . $feed_name . "/data");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "X-AIO-Key: " . ADAFRUIT_IO_KEY,
        "Content-Type: application/json"
    ));
    $response = curl_exec($ch);
    if ($response === false) {
        die("cURL error: " . curl_error($ch));
    }
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($http_code >= 400) {
        die("HTTP error: " . $http_code . " " . $response);
    }
    $data = json_decode($response, true);
    if ($data === null) {
        die("JSON decode error: " . json_last_error_msg() . "\nResponse: " . $response);
    }

    // GET DEVICE ID FROM DATABASE BASED ON DEVICE NAME
    $stmt = $conn->prepare("SELECT id FROM devices WHERE feed_name = ?");
    $stmt->bind_param("s", $feed_name);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $device_id = $row['id'];
    } else {
        $device_id = 0;
    }
    $stmt->close();

    // PROCESS DATA FOR DEVICE
    $datapoint = reset($data);
    $value = $datapoint['value'];
    $created_at = $datapoint['created_at'];
    if ($device_id == 2 && $value == 'CLOSE') {
        $value = 0;
    } elseif ($device_id == 2 && $value == 'OPEN') {
        $value = 1;
        }

    //GET DATA FROM DATABASE
    $stmt = $conn->prepare("SELECT timestamp, value FROM sensor_readings WHERE device_id = ? ORDER BY timestamp DESC LIMIT 1");
    $stmt->bind_param("i", $device_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $latest_timestamp = $row['timestamp'];
        $latest_value = $row['value'];
    }
    else{
        $latest_value = -1;
    }
    $stmt->close();

    //CHECK LOOP DATA
    if ($value != $latest_value) {
        $stmt = $conn->prepare("INSERT INTO sensor_readings (device_id, timestamp, value) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $device_id, $created_at, $value);
        $stmt->execute();
        $stmt->close();
    }
}

//DELETE OLD DATA
$conn->query("DELETE FROM sensor_readings WHERE id NOT IN (SELECT id FROM (SELECT id FROM sensor_readings ORDER BY timestamp DESC LIMIT 100) x)");

$conn->close();
?>
