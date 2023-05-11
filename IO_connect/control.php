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
define('ADAFRUIT_IO_USERNAME', 'QliShad');
define('ADAFRUIT_IO_KEY', 'aio_lrid12IZA43nz4xSNacwwE9br4uN');

// Get all devices with sensor type "button" or sensor name "Two-mode text"
$sql = "SELECT d.name AS device_name, r.name AS room_name, d.feed_name AS feed_name, s.name AS sensor_name FROM devices d JOIN sensors s ON d.sensor_id = s.id JOIN rooms r ON d.room_id = r.id WHERE s.type = 'button' OR s.name = 'Two-mode text'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Display device name and room name
        echo "<div class='device-block'>";
        echo "<div class='device-name'>" . $row["device_name"] . "</div>";
        echo "<div class='room-name'>in " . $row["room_name"] . "</div>";

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
        if ($row["sensor_name"] == "Two-mode text") {
            if ($value == '1' || $value == 'OPEN') {
                echo "<div class='status'>Status: OPEN</div>";
                echo "<button onclick=\"updateValue('" . $row["feed_name"] . "', 'CLOSE')\">CLOSE</button>";
            } else {
                echo "<div class='status'>Status: CLOSED</div>";
                echo "<button onclick=\"updateValue('" . $row["feed_name"] . "', 'OPEN')\">OPEN</button>";
            }
        } else {
            if ($value == '1') {
                echo "<div class='status'>Status: ON</div>";
                echo "<button onclick=\"updateValue('" . $row["feed_name"] . "', '0')\">Turn OFF</button>";
            } else {
                echo "<div class='status'>Status: OFF</div>";
                echo "<button onclick=\"updateValue('" . $row["feed_name"] . "', '1')\">Turn ON</button>";
            }
        }

        echo "</div>";
    }
} else {
    echo "0 results";
}

$conn->close();

?>

<style>
.device-block {
    display: inline-block;
    width: 200px;
    height: 150px;
    margin: 10px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    text-align: center;
}

.device-name {
    font-size: 18px;
    font-weight: bold;
}

.room-name {
    font-size: 14px;
}

.status {
    margin-top: 20px;
    font-size: 16px;
}
</style>

<script>
function updateValue(feedName, value) {
    // Update value on Adafruit IO
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            location.reload();
        }
    };
    xhttp.open("POST", "https://io.adafruit.com/api/v2/" + "<?php echo ADAFRUIT_IO_USERNAME; ?>" + "/feeds/" + feedName + "/data", true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.setRequestHeader("X-AIO-Key", "<?php echo ADAFRUIT_IO_KEY; ?>");
    xhttp.send(JSON.stringify({value: value}));
}
</script>