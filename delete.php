<?php
include("connection.php");
include("nav.php");
if (!isset($_SESSION['user'])) {
    echo "<script>alert('Please login first');
    document.location='index.php'
  </script>";
}
$user = $_SESSION['user'];
$sql = "SELECT * FROM `homes` where username = '$user'";
$run = mysqli_query($conn, $sql);
if (isset($_POST['delete'])) {
    $holding_number = $_POST['hn'];
    $sql = "DELETE FROM `reviews` WHERE holding_number = $holding_number";
    $run = mysqli_query($conn, $sql);
    $sql = "DELETE FROM categories WHERE holding_number = $holding_number";
    $run = mysqli_query($conn, $sql);
    $sql = "DELETE FROM `homes` WHERE holding_number = $holding_number";
    $run = mysqli_query($conn, $sql);
    if ($run) {
        echo "<script>alart('Home deleted Successfully');</script>";
    }
    header("location:delete.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update home details</title>
    <style>
    img {
        width: 100px;
        height: 100px;
    }
    </style>
</head>

<body style="background-color: #dfe6e9">

    <main>
        <div class="container-fluid">
            <table class="table table-striped">
                <thead>
                    <td scope="col">User Name</td>
                    <td scope="col">House Name</td>
                    <td scope="col">Holding Number</td>
                    <td scope="col">Bed Room</td>
                    <td scope="col">Wash Room</td>
                    <td scope="col">Balcony</td>
                    <td scope="col">Rent Amount</td>
                    <td scope="col">City</td>
                    <td scope="col">Sub district</td>
                    <td scope="col">Area</td>
                    <td scope="col">Image 1</td>
                    <td scope="col">Image 2</td>
                    <td scope="col">Image 3</td>
                    <td scope="col">Operation</td>
                </thead>

                <?php
                while ($result = mysqli_fetch_assoc($run)) {
                ?>
                <tr scope="row">
                    <td><?php echo $result["username"] ?></td>
                    <td><?php echo $result["house_name"] ?></td>
                    <td><?php echo $result["holding_number"] ?></td>
                    <td><?php echo $result["bed_room"] ?></td>
                    <td><?php echo $result["wash_room"] ?></td>
                    <td><?php echo $result["balcony"] ?></td>
                    <td><?php echo $result["rent_amount"] ?></td>
                    <td><?php echo $result["district"] ?></td>
                    <td><?php echo $result["sub_district"] ?></td>
                    <td><?php echo $result["area"] ?></td>
                    <td><img src="<?php echo 'images/' . $result["image1"] ?>" alt="Image not found"></td>
                    <td><img src="<?php echo 'images/' . $result["image2"] ?>" alt="Image not found"></td>
                    <td><img src="<?php echo 'images/' . $result["image3"] ?>" alt="Image not found"></td>
                    <td>
                        <form action="delete.php" method="POST">
                            <input type="text" value="<?php echo $result['holding_number']; ?>" name="hn" hidden>
                            <input type="submit" name="delete" class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                    <td>
                        <form action="view.php" method="POST">
                            <input type="text" value="<?php echo $result['holding_number']; ?>" name="hn" hidden>
                            <input type="submit" name="edit" value="update" class="btn btn-primary">
                        </form>
                    </td>
                </tr>
                <?php
                }
                ?>
            </table>

        </div>
    </main>
    <footer>
        <?php include("footer.php") ?>
    </footer>
</body>

</html>