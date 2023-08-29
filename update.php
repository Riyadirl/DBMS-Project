<?php
include("connection.php");
include("nav.php");
if (isset($_POST['submit'])) {
    $house_number = $_POST['house_number'];
    $_SESSION["house_number"] = $house_number;
    $query = "SELECT * FROM HOMES WHERE house_number = '$house_number'";
    $run = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($run);
    if ($result == NUll) {
        echo "No data found";
    } else {
        $_SESSION['houser_number'] = $result['house_number'];
        header("location:view.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body style="background-color: #dfe6e9">
    <div class="container m-auto bg-primary text-white rounded">
        <div class="text-center">
            <h1>Update Details</h1>
        </div>
        <form action="update.php" method="POST">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control mb-2" placeholder="House Number" area-label="House Number" name="house_number" required>
                </div>
                <div class="col">
                    <input type="submit" value="View details" name="submit" class="bg-success text-white btn mb-2">
                </div>
            </div>
        </form>
    </div>
    <?php include("footer.php"); ?>
</body>

</html>