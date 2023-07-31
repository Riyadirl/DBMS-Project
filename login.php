<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    include('./db_connect.php');

    // Get form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // SQL query to check if the user exists
    $check_user_query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($check_user_query);

    if ($result->num_rows == 1) {
        // User exists, now verify the password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Login successful
            // Redirect to index.php (main page/home page)
            header("Location: index.php");
            exit(); // Make sure to exit after redirection
        } else {
            // Incorrect password
            $error_message = "Incorrect password. Please try again.";
        }
    } else {
        // Invalid username
        $error_message = "Invalid username. Please try again.";
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Rent-Ease | User Login</title>
    <link rel="stylesheet" type="text/css" href="./css/form.css">
    <style>
        .container {
            text-align: center;
        }

        .error-message {
            color: red;
            font-weight: bold;
        }
    </style>
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

            <div class="error-message">
                <?php
                // Display error messages if they exist
                if (isset($error_message)) {
                    echo $error_message;
                }
                ?>
            </div>
        </form>
        <p>Don't have an account? <a href="registration.php">Register here</a></p>
    </div>
</body>

</html>