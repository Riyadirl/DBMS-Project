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
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT); // Hash the password
    $district = $_POST["district"];
    $sub_district = $_POST["sub_district"];
    $area = $_POST["area"];

    // SQL query to insert user data into the database
    $sql = "INSERT INTO users (username, email, pass, district, sub_district, area)
            VALUES ('$username', '$email', '$password', '$district', '$sub_district', '$area')";

    if ($conn->query($sql) === TRUE) {
        // Registration successful
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Rent-Ease | User Registration</title>
    <link rel="stylesheet" type="text/css" href="form.css">
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