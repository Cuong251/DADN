<?php

define('ADAFRUIT_IO_USERNAME', 'tysonnguyen1702'); 
define('ADAFRUIT_IO_KEY', 'aio_heQv81idjSNPDAbemnpP7OIMl86f');
$feed_name = 'welcome-feed'; 


if (isset($_POST['value'])) {
    $value = $_POST['value'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://io.adafruit.com/api/v2/" . ADAFRUIT_IO_USERNAME . "/feeds/" . $feed_name . "/data");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array("value" => $value)));
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
    echo "Value " . $value . " recorded successfully.";
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Input Data to Adafruit Feed</title>
</head>
<body>
    <h1>Input Data to Adafruit Feed</h1>
    <form method="post" action="">
        <label for="value">Value:</label>
        <input type="text" name="value" id="value">
        <input type="submit" value="Submit">
    </form>
</body>
</html>