<!DOCTYPE html>
<html>
<head>
	<title>Add Device</title>
</head>
<body>
	<h1>Add Device</h1>

	<?php
		// Connect to database
		$host = "localhost";
		$username = "root";
		$password = "";
		$dbname = "smart_home";

		$conn = mysqli_connect($host, $username, $password, $dbname);

		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// Fetch house data
		$sql = "SELECT id, name, address FROM houses";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			$houses = array();

			while ($row = mysqli_fetch_assoc($result)) {
				$houses[] = $row;
			}
		} else {
			echo "No houses found. Please add a house first.";
			exit();
		}

		// Fetch room data
		$sql = "SELECT id, name, house_id FROM rooms";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			$rooms = array();

			while ($row = mysqli_fetch_assoc($result)) {
				$rooms[] = $row;
			}
		} else {
			echo "No rooms found. Please add a room first.";
			exit();
		}

		// Fetch sensor data
		$sql = "SELECT id, name, type FROM sensors";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			$sensors = array();

			while ($row = mysqli_fetch_assoc($result)) {
				$sensors[] = $row;
			}
		} else {
			echo "No sensors found. Please add a sensor first.";
			exit();
		}

		// Close database connection
		mysqli_close($conn);

		// Handle form submission
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// Get form data
			$name = $_POST["name"];
			$room_id = $_POST["room_id"];
			$sensor_id = $_POST["sensor_id"];

			// Connect to database
			$conn = mysqli_connect($host, $username, $password, $dbname);

			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			// Insert new device into database
			$sql = "INSERT INTO devices (name, room_id, sensor_id) VALUES ('$name', '$room_id', '$sensor_id')";

			if (mysqli_query($conn, $sql)) {
				echo "Device added successfully.";
			} else {
				echo "Error adding device: " . mysqli_error($conn);
			}

			// Close database connection
			mysqli_close($conn);
		}
	?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<label for="name">Name:</label>
	<input type="text" id="name" name="name" required><br><br>

    <label for="room_id">Room:</label>
    <select id="room_id" name="room_id" required>
        <option value="">Select a room</option>
        <?php foreach ($rooms as $room): ?>
            <option value="<?php echo $room['id']; ?>"><?php echo $room['name']; ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label for="sensor_id">Sensor:</label>
    <select id="sensor_id" name="sensor_id" required>
        <option value="">Select a sensor</option>
        <?php foreach ($sensors as $sensor): ?>
            <option value="<?php echo $sensor['id']; ?>"><?php echo $sensor['name'] . ' (' . $sensor['type'] . ')'; ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <input type="submit" value="Add Device">
</form>