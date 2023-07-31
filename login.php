<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database_name";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // SQL query to check if the user exists and verify the password
    $sql = "SELECT pass FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["pass"])) {
            // Login successful
            echo "Login successful!";
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Invalid username or password.";
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Rent-Ease | User Login</title>
    <link rel="stylesheet" type="text/css" href="form.css">
</head>

<body>
    <div class="container">
        <h1>User Login</h1>
        <form action="login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Login">
        </form>
        <p>Don't have an account? <a href="registration.php">Register here</a></p>
    </div>
</body>

</html>