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
        // User exists
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Login successful

            exit();
        } else {

            $error_message = "Incorrect password. Please try again.";
        }
    } else {

        $error_message = "Invalid username. Please try again.";
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Rent-Ease | User Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        <div class="row justify-content">
            <div class="col-md-12">
                <h1 class="text-center">User Login</h1>
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>

                    <div class="error-message mt-3">
                        <?php
                        // Display error messages if they exist
                        if (isset($error_message)) {
                            echo $error_message;
                        }
                        ?>
                    </div>
                </form>
                <p class="mt-3 text-center">Don't have an account? <a href="registration.php">Register here</a></p>
            </div>
        </div>
    </div>
</body>

</html>