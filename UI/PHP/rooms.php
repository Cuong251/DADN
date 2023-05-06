<!DOCTYPE html>
<html>
<head>
    <title>Rooms</title>
    <link rel="stylesheet" type="text/css" href="/DADN/UI/CSS/user.css">
</head>
<body>
<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

// Establish database connection
$conn = mysqli_connect('localhost', 'root', '', 'smart_home');

// Retrieve user's rooms from database
$user_id = $_SESSION['id'];
$sql = "SELECT rooms.id, rooms.name FROM rooms INNER JOIN houses ON rooms.house_id = houses.id INNER JOIN user_house ON houses.id = user_house.house_id WHERE user_house.user_id = $user_id";
$result = mysqli_query($conn, $sql);

if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

// Display user's rooms
while ($row = mysqli_fetch_assoc($result)) {
    $room_id = $row['id'];
    $room_name = $row['name'];
    echo "<div class='room'><h2>$room_name</h2><a href='view_room.php?id=$room_id'>View room</a></div>";
}
?>
</body>
</html>