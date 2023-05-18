<!DOCTYPE html>
<html>

<head>
    <title>User Page</title>
    <link rel="stylesheet" type="text/css" href="/DADN/UI/CSSs/user.css">
</head>

<body>
    <?php
    // Establish database connection
    $conn = mysqli_connect('localhost', 'root', '', 'smart_home');

    // Retrieve user's ID from GET parameter
    $id = $_GET['id'];

    // Retrieve user's information from database
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }

    $row = mysqli_fetch_assoc($result);

    // Display user's information
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $email = $row['email'];
    $phone = $row['phone_number'];
    $birthday = $row['birthday'];
    echo "
    <h1>Welcome back to your smart home, $firstname!</h1>
    <p><strong>First Name:</strong> $firstname</p>
    <p><strong>Last Name:</strong> $lastname</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Phone:</strong> $phone</p>
    <p><strong>Birthday:</strong> $birthday</p>
    <a href='/DADN/UI/PHP/index.php'>View your home</a>
";
    ?>
</body>

</html>