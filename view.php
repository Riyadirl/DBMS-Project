<?php
include("connection.php");
include("nav.php");
if (isset($_POST["edit"])) {
    $holding_number = $_POST['hn'];
    $query = "SELECT * FROM HOMES WHERE holding_number = $holding_number";
    $run = mysqli_query($conn, $query);
    if ($run) {
        $result = mysqli_fetch_assoc($run);
    }
}

if (isset($_POST['update'])) {
    $holding_number = $_POST['hn'];
    $image1 = $_FILES['image1']['name'];
    $image2 = $_FILES['image2']['name'];
    $image3 = $_FILES['image3']['name'];
    $house_name = $_POST["house_name"];
    $house_rent = $_POST["house_rent"];
    if ($image1 != NULL) {
        $sql = "UPDATE homes
        set image1 = '$image1'
        where holding_number = '$holding_number'";
        $run = mysqli_query($conn, $sql);
        move_uploaded_file($_FILES['image1']['tmp_name'], "images/" . $image1);
    }
    if ($image2 != NULL) {
        $sql = "UPDATE homes
        set image2 = '$image2'
        where holding_number = '$holding_number'";
        $run = mysqli_query($conn, $sql);
        move_uploaded_file($_FILES['image2']['tmp_name'], "images/" . $image2);
    }
    if ($image3 != NULL) {
        $sql = "UPDATE homes
        set image3 = '$image3'
        where holding_number = '$holding_number'";
        $run = mysqli_query($conn, $sql);
        move_uploaded_file($_FILES['image3']['tmp_name'], "images/" . $image3);
    }
    if ($house_name != $result['house_name']) {
        $sql = "UPDATE homes
        set house_name = '$house_name'
        where holding_number = '$holding_number'";
        $run = mysqli_query($conn, $sql);
    }
    if ($house_rent != $result['rent_amount']) {
        $sql = "UPDATE homes
        set rent_amount = '$house_rent'
        where holding_number = '$holding_number'";
        $run = mysqli_query($conn, $sql);
    }
    header("location:delete.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        img {
            width: 200px;
            height: 200px;
        }
    </style>
</head>

<body style="background-color: #dfe6e9">
    <div class="container rounded bg-primary p-3 mt-3">
        <div class="text-center text-white">
            <h1>Old details</h1>
        </div>
        <form action="view.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-4">
                    <img src="<?php echo "images/" . $result["image1"]; ?>" class="rounded mb-2 img-fluid img-thumbnail img-start" alt="Image not found">
                </div>
                <div class="col-4">
                    <img src="<?php echo "images/" . $result["image2"]; ?>" class="rounded mb-2 img-fluid img-thumbnail img-start" alt="Image not found">
                </div>
                <div class="col-4">
                    <img src="<?php echo "images/" . $result["image3"]; ?>" class="rounded mb-2 img-fluid img-thumbnail img-start" alt="Image not found">
                </div>
                <div class="row">
                    <div class="col-4">
                        <input type="file" name="image1" class="form-control mb-2">
                    </div>
                    <div class="col-4">
                        <input type="file" name="image2" class="form-control mb-2">
                    </div>
                    <div class="col-4">
                        <input type="file" name="image3" class="form-control mb-2">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label for="" class="form-control mb-2 bg-dark text-white">House Name</label>
                    <input type="text" value="<?php echo $result['house_name']; ?>" name="house_name" class="form-control mb-2">
                    <label for="" class="form-control mb-2 bg-dark text-white">House Rent</label>
                    <input type="text" value="<?php echo $result['rent_amount']; ?>" name="house_rent" class="form-control mb-2">
                </div>
            </div>
            <div>
                <input type="text" value="<?php echo $result['holding_number']; ?>" hidden name="hn">
                <input type="submit" value="Update" name="update" class="btn btn-success">
            </div>
        </form>
    </div>
    <div>
        <?php include('footer.php') ?>
    </div>
</body>

</html>