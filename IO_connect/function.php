<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'smart_home';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["action"])){
  if($_POST["action"] == "insert"){
    insert();
  }
  else{
    delete();
  }
}
function insert(){
  global $conn;

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
function delete() {
  global $conn;

  $id = $_POST["action"];

  $query = "DELETE FROM devices WHERE id = $id";
  mysqli_query($conn, $query);
  echo "Deleted Successfully";
}