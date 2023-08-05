<?php
//database connection 
include('./db_connect.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = ($_POST["password"]); // Hash the password
    $district = $_POST["district"];
    $sub_district = $_POST["sub_district"];
    $area = $_POST["area"];

    // Check if the username already exists
    $check_username_query = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($check_username_query);
    if ($result->num_rows > 0) {
        echo '<script>alert("Username already exists. Please choose a different username.");</script>';
    } else {
        // SQL query to insert user data into the database
        $sql = "INSERT INTO users (username, email, password, district, sub_district, area)
                VALUES ('$username', '$email', '$password', '$district', '$sub_district', '$area')";

        if ($conn->query($sql) === TRUE) {
            // Registration successful
            echo '<script>alert("Registration successful!");</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Rent-Ease | User Registration</title>
    <link rel="stylesheet" type="text/css" href="./css/form.css">
    <link rel="stylesheet" type="text/css" href="./css/form_alert.css">
</head>

<body>
    <div class="container">
        <h1>User Registration</h1>
        <form action="registration.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="district">District:</label>
            <input type="text" id="district" name="district" required>

            <label for="sub_district">Sub-District:</label>
            <input type="text" id="sub_district" name="sub_district" required>

            <label for="area">Area:</label>
            <input type="text" id="area" name="area" required>

            <input type="submit" value="Register">
        </form>
        <p>Already have an account? <a href="login.html">Login here</a></p>
    </div>
</body>

</html>