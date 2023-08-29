<?php
include("nav.php");
//database connection 
include("connection.php");

// Check if the form is submitted
if(isset($_POST['submit'])) {

    // Get form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = ($_POST["password"]);
    $district = $_POST["district"];
    $sub_district = $_POST["sub_district"];
    $area = $_POST["area"];

    // Check if the username already exists
    $sql = "SELECT username FROM users where username = '$username'";
    $run = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($run);
    print_r($result);
    if($result != NULL)
    {
        echo "<script>alert('email already exit')</script>";
    }
    else{
        $sql = "INSERT INTO `users`(`username`, `email`, `password`, `district`, `sub_district`, `area`) VALUES ('$username','$email','$password','$district','$sub_district','$area')";
        $run = mysqli_query($conn, $sql);
        if($run)
        {
            header("location:login.php");
        }
        else{
            echo "<script>alert('try again')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Rent-Ease | User Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="./css/form.css">
    <link rel="stylesheet" type="text/css" href="./css/form_alert.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h1 class="text-center">User Registration</h1>
                <form action="registration.php" method="POST">
                    <div class="form-group">
                        <label for="username">Enter you name:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="form-group">
                        <label for="district">District:</label>
                        <input type="text" class="form-control" id="district" name="district" required>
                    </div>

                    <div class="form-group">
                        <label for="sub_district">Sub-District:</label>
                        <input type="text" class="form-control" id="sub_district" name="sub_district" required>
                    </div>

                    <div class="form-group">
                        <label for="area">Area:</label>
                        <input type="text" class="form-control" id="area" name="area" required>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Register" name="submit">
                </form>
                <p class="mt-3 text-center">Already have an account? <a href="login.php">Login here</a></p>
            </div>
        </div>
    </div>
</body>

</html>