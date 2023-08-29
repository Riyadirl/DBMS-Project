<?php
include("nav.php");
if (!isset($_SESSION['user'])) {
    echo "<script>alert('Please login first');
    document.location='index.php'
  </script>";
}
include("connection.php");
if (isset($_POST['submit'])) {
    $holding_num = $_POST['holding_num'];
    $_SESSION['holding_number'] = $holding_num;
    $sql = "SELECT
    h.*,
    c.family, c.male_bechelor, c.female_bechelor
FROM
    homes AS h
INNER JOIN
    categories AS c
ON
    h.holding_number = c.holding_number
WHERE
    h.holding_number = $holding_num;
";
    $sql1 ="SELECT review FROM reviews WHERE holding_number = $holding_num";
    $run = mysqli_query($conn, $sql);
    $run1 = mysqli_query($conn, $sql1);
    if ($run) {
        $result = mysqli_fetch_assoc($run);
    } else {
        echo "Some Problem occour";
    }
}
else{
    $holding_number = $_SESSION['holding_number'];
    $sql = "SELECT
    h.*,
    c.family, c.male_bechelor, c.female_bechelor
FROM
    homes AS h
INNER JOIN
    categories AS c
ON
    h.holding_number = c.holding_number
WHERE
    h.holding_number = $holding_number;";
    $sql1 ="SELECT review FROM reviews WHERE holding_number = $holding_number";
    $run = mysqli_query($conn, $sql);
    $run1 = mysqli_query($conn, $sql1);
    if ($run) {
        $result = mysqli_fetch_assoc($run);
    } else {
        echo "Some Problem occour";
    }
}
if(isset($_POST['rent'])){
    $user = $_SESSION['user'];
    $holding_num = $result['holding_number'];
    $sql = "SELECT username FROM rents WHERE username = '$user'";
    $run = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($run);
    if($result == NULL){
        $sql = "INSERT INTO `rents`(`username`, `holding_number`) VALUES ('$user', $holding_num)";
    $run = mysqli_query($conn, $sql);
    $sql1 = "UPDATE homes SET status = 'r' WHERE holding_number = $holding_num";
    $run1 = mysqli_query($conn, $sql1);
    if($run && $run1){
        echo "<script>alert('Congratulation! You successfully rent the house');
        document.location='index.php'</script>";
    }
    else{
        echo "<script>alert('Something wrong, please try again letter');
        document.location ='index.php';</script>";
    }
    }
    else{
        echo "<script>alert('You already rent a home, Can not rent home now');
        document.location='index.php'</script>";
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <style>

    </style>
</head>

<body style="background-color: #dfe6e9">
    <div class="container">
        <div class="row">
            <div class="col-4 mb-2">
                <img class="rounded img-fluid" src="<?php echo 'images/' . $result['image1']; ?>" alt="Image not found">
            </div>
            <div class="col-4 mb-2">
                <img class="rounded img-fluid" src="<?php echo 'images/' . $result['image2']; ?>" alt="Image not found">
            </div>
            <div class="col-4 mb-2">
                <img class="rounded img-fluid" src="<?php echo 'images/' . $result['image3']; ?>" alt="Image not found">
            </div>
            <hr>
            <div class="container text-left">
                <table class="table table-striped table-primary">
                    <tr>
                        <td>User Name: </td>
                        <td><?php echo $result['username']; ?></td>
                    </tr>
                    <tr>
                        <td>House Name</td>
                        <td><?php echo $result['house_name']; ?></td>
                    </tr>
                    <tr>
                        <td>Holding number</td>
                        <td><?php echo $result['holding_number']; ?></td>
                    </tr>
                    <tr>
                        <td>Number of bed room</td>
                        <td><?php echo $result['bed_room']; ?></td>
                    </tr>
                    <tr>
                        <td>Number of wash room</td>
                        <td><?php echo $result['wash_room']; ?></td>
                    </tr>
                    <tr>
                        <td>Number of balcony</td>
                        <td><?php echo $result['balcony']; ?></td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td><?php echo $result['district']; ?></td>
                    </tr>
                    <tr>
                        <td>Sub district</td>
                        <td><?php echo $result['sub_district']; ?></td>
                    </tr>
                    <tr>
                        <td>Area</td>
                        <td><?php echo $result['area']; ?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><?php echo $result['address']; ?></td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Family</td>
                        <td><?php echo $result['family']; ?></td>
                    </tr>
                    <tr>
                        <td>Male bachelor</td>
                        <td><?php echo $result['male_bechelor']; ?></td>
                    </tr>
                    <tr>
                        <td>Female bachelor</td>
                        <td><?php echo $result['female_bechelor']; ?></td>
                    </tr>
                    <tr>
                        <td>Rent</td>
                        <td><?php echo $result['rent_amount']; ?></td>
                    </tr>
                </table>
                <div class="row">
                    <div class="col-6">
                        <a class="btn btn-primary" href="index.php">Back</a>
                    </div>
                    <div class="col-6">
                        <form action="details.php" method="POST">
                            <input type="submit" name="rent" class="btn btn-info" action="details.php"
                                value="Rent House">
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>Review</h2>
                    </div>
                    <?php while($result1 = mysqli_fetch_assoc($run1)){
                        ?>
                    <table class="table table-striped table-primary">
                        <tr>
                            <td><?php echo $result1['review']; ?></td>
                        </tr>
                    </table>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <?php include("footer.php"); ?>
    </footer>
</body>

</html>