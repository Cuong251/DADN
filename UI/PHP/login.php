<?php
// Establish database connection
$conn = mysqli_connect('localhost', 'root', '', 'smart_home');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the user's credentials from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the user's credentials are correct
    $query = "SELECT id FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // If the user's credentials are correct, get the user's ID
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];

        // Redirect to the user.php page with the user's ID as a GET parameter
        header("Location: user.php?id=$id");
        exit;
    } else {
        // If the user's credentials are incorrect, display an error message
        echo '<script> alert("Wrong username/password"); </script>';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="/DADN/UI/CSS/login.css">
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="background">
        <img src="/DADN/UI/Imgs/login_background.jpg">
    </div>
    <div class="content">
        <img src="/DADN/UI/Imgs/logo.png" alt="House Logo" class="logo">
        <h1>Welcome home</h1>
        <form method="POST">
            <div class="input-group">
                <label for="username"></label>
                <input type="text" id="username" name="username" placeholder="Username">
            </div>
            <div class="input-group">
                <label for="password"></label>
                <input type="password" id="password" name="password" placeholder="Password">
            </div>
            <button type="submit">LOGIN</button>
        </form>
        <div class="links">
            <a href="#">Forgot Password</a>
            <a href="#">Sign up</a>
        </div>
    </div>
</body>

</html>