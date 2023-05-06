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

// Execute a SELECT query to retrieve the latest value and device name for each device from the sensor_readings table in your database
$result = $conn->query("
    SELECT devices.name AS device_name, sensor_readings.value AS value
    FROM sensor_readings
    JOIN devices ON sensor_readings.device_id = devices.id
    WHERE sensor_readings.timestamp IN (
        SELECT MAX(timestamp)
        FROM sensor_readings
        GROUP BY device_id
    )
");

// Check if any rows were returned by the query
if ($result->num_rows > 0) {
    // Output an HTML table to display the data
    echo "<table>";
    echo "<tr><th>Device Name</th><th>Value</th></tr>";

    // Loop through each row in the result set
    while ($row = $result->fetch_assoc()) {
        // Output a table row with the data from the current row
        $device_name = htmlspecialchars($row['device_name']);
        $value = htmlspecialchars($row['value']);

        if ($device_name == "Camera 1" && ($value == 0 || $value == 1)) {
            // Check if device_id is 1 and value is either 0 or 1
            if ($value == 1) {
                echo "<tr><td>$device_name</td><td>ON</td></tr>";
            } else {
                echo "<tr><td>$device_name</td><td>OFF</td></tr>";
            }
        }
        else{
            echo "<tr><td>" . htmlspecialchars($row['device_name']) . "</td><td>" . htmlspecialchars($row['value']) . "</td></tr>";
        }
    }
    echo "</table>";
} else {
    // No rows were returned by the query
    echo "0 results";
}

// Close the MySQL connection
$conn->close();
?>