<?php  
        include 'connect.php'; 
        include 'control.php';
        $db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'smart_home';

// Create a connection to the MySQL database
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};
        $result1= $conn->query("
        SELECT value from sensor_readings JOIN devices on devices.id = sensor_readings.device_id where devices.name='Temperature 1';   
        ");
        $resultTemp = $result1->fetch_array()[0] ?? '';
        $result2= $conn->query("
        SELECT value from sensor_readings JOIN devices on devices.id = sensor_readings.device_id where devices.name='Fan 1';   
        ");
        while ($resultFan = $result2->fetch_array() ) {
            $result=$resultFan[0];
            // do what you need.
        }
        $conn->close();
        $arrayR=array(0=>$resultTemp,1=>$result);
        echo json_encode($arrayR);
    ?>