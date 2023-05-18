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
    echo "<h1>Sensor Data</h1>";
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
        } elseif ($sensor_name == "Two-mode number") {
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
    echo "<h1>No Results</h1>";
}

// Close the MySQL connection
$conn->close();


// Create a connection to the MySQL database
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Execute a SELECT query to retrieve the sensor readings for "Humid 1" and "Temperature 1"
$result_humid = $conn->query("
SELECT timestamp, value
FROM sensor_readings sr
JOIN devices d ON sr.device_id = d.id
JOIN sensors s ON d.sensor_id = s.id
WHERE d.name = 'Humid 1'
ORDER BY timestamp ASC
");

$result_temp = $conn->query("
SELECT timestamp, value
FROM sensor_readings sr
JOIN devices d ON sr.device_id = d.id
JOIN sensors s ON d.sensor_id = s.id
WHERE d.name = 'Temperature 1'
ORDER BY timestamp ASC
");

// Prepare arrays to store the timestamp and value data for each sensor
$humid_timestamps = array();
$humid_values = array();
$temp_timestamps = array();
$temp_values = array();

// Process the sensor readings for "Humid 1"
if ($result_humid->num_rows > 0) {
    while ($row = $result_humid->fetch_assoc()) {
        // Store the timestamp and value in the corresponding arrays
        $humid_timestamps[] = $row['timestamp'];
        $humid_values[] = $row['value'];
    }
}

// Process the sensor readings for "Temperature 1"
if ($result_temp->num_rows > 0) {
    while ($row = $result_temp->fetch_assoc()) {
        // Store the timestamp and value in the corresponding arrays
        $temp_timestamps[] = $row['timestamp'];
        $temp_values[] = $row['value'];
    }
}

// Close the MySQL connection
$conn->close();
?>


<!DOCTYPE html>
<html>

<head>
    <title>Sensor Data</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="chart-container-small">
        <canvas id="humidityChart"></canvas>
    </div>
    <div class="chart-container-small">
        <canvas id="temperatureChart"></canvas>
    </div>

    <script>
        // Convert PHP arrays to JavaScript arrays
        var humidTimestamps = <?php echo json_encode($humid_timestamps); ?>;
        var humidValues = <?php echo json_encode($humid_values); ?>;
        var tempTimestamps = <?php echo json_encode($temp_timestamps); ?>;
        var tempValues = <?php echo json_encode($temp_values); ?>;

        // Create the humidity chart
        var humidityChart = new Chart(document.getElementById('humidityChart'), {
            type: 'line',
            data: {
                labels: humidTimestamps,
                datasets: [{
                    label: 'Humidity',
                    data: humidValues,
                    borderColor: 'blue',
                    fill: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Timestamp'
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Humidity (%)'
                        }
                    }
                }
            }
        });

        // Create the temperature chart
        var temperatureChart = new Chart(document.getElementById('temperatureChart'), {
            type: 'line',
            data: {
                labels: tempTimestamps,
                datasets: [{
                    label: 'Temperature',
                    data: tempValues,
                    borderColor: 'red',
                    fill: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Timestamp'
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Temperature (°C)'
                        }
                    }
                }
            }
        });
    </script>
</body>

</html>