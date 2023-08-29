<?php
include("nav.php");
include("connection.php");
if(isset($_POST['submit'])){
    $user = $_POST['user'];
    $pass=$_POST['password'];
    $sql="SELECT username, `password` FROM users Where username = '$user' ";
    $run = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($run);
    if($result != NULL)
    {
        if($pass == $result['password'] && $user == $result['username']){
            session_start();
            $_SESSION['user'] = $user;
            header("location:index.php");
        }
        else{
            $error_message ="Wrong user name or password";
        }
    }
    else{
        $error_message ="User Not found. Please register first";
    }
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
                        <label for="user">user:</label>
                        <input type="text" class="form-control" id="user" name="user" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <input type="submit" name="submit", value="Login" class="btn btn-primary">

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