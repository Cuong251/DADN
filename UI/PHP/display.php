<?php
// Set your MySQL database credentials
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'smart_home';

// Create a connection to the MySQL database
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Execute a SELECT query to retrieve the latest value, device name, room name, sensors.name for each device from the sensor_readings table in your database
$result = $conn->query("
SELECT sr.value AS value, d.name AS device_name, r.name AS room_name, s.name AS sensor_name
FROM sensor_readings sr
JOIN devices d ON sr.device_id = d.id
JOIN rooms r ON d.room_id = r.id
JOIN sensors s ON d.sensor_id = s.id
JOIN (
    SELECT device_id, MAX(timestamp) AS latest_timestamp
    FROM sensor_readings
    GROUP BY device_id
) AS latest ON sr.device_id = latest.device_id AND sr.timestamp = latest.latest_timestamp

");

// Check if any rows were returned by the query
if ($result->num_rows > 0) {
    // Output an HTML table to display the data
    echo "<table>";
    echo "<tr><th>Device Name</th><th>Room</th><th>Value</th></tr>";

    // Loop through each row in the result set
    while ($row = $result->fetch_assoc()) {
        // Output a table row with the data from the current row
        $device_name = htmlspecialchars($row['device_name']);
        $room_name = htmlspecialchars($row['room_name']);
        $value = htmlspecialchars($row['value']);
        $sensor_name = htmlspecialchars($row['sensor_name']);

        if ($sensor_name == "Two-mode text") {
            // Check if device_id is 1 and value is either 0 or 1
            if ($value == 1) {
                $value = 'OPEN';
            } else {
                $value = 'CLOSE';
            }
        }
        elseif($sensor_name == "Two-mode number"){
            if ($value == 1) {
                $value = 'ON';
            } else {
                $value = 'OFF';
            }
        }
            echo "<tr><td>$device_name</td><td>$room_name</td><td>$value</td></tr>";
    }
    echo "</table>";
} else {
    // No rows were returned by the query
    echo "0 results";
}

// Close the MySQL connection
$conn->close();
?>