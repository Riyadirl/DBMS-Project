<?php
include("connection.php");
include("nav.php");
if (!isset($_SESSION['user'])) {
    echo "<script>alert('Please login first');
    document.location='index.php';
  </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        .dropdown {
            margin-bottom: 10px;
        }

        select {
            padding: 5px;
            border-radius: 10px;
        }

        p {
            display: inline;
            margin-right: 5px;
        }
    </style>
</head>

<body style="background-color: #dfe6e9">
    <div class="container m-auto text-white rounded" style="background-color:#34ace0">
        <div class="text-center">
            <h1>Add New Home</h1>
        </div>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <label for="" class="form-control mb-2 bg-dark text-white">User Name:- <?php echo $_SESSION['user']; ?></label>
                </div>
                <div class="col">
                    <input type="text" class="form-control mb-2" placeholder="House Name" aria-label="House Name" name="name" required>
                </div>
                <div class="col">
                    <input type="text" class="form-control mb-2" placeholder="Holding number" aria-label="House Number" name="house_number" required>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="dropdown from-control">
                        <p>City</p>
                        <select name="district" id="">
                            <option value="Dhaka">Dhaka</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="dropdown">
                        <p>Sub_district</p>
                        <select name="sub_d" id="">
                            <option value="Badda">Badda</option>
                            <option value="Batara">Batara</option>
                            <option value="Gulshan">Gulshan</option>
                            <option value="Uttara">Uttara</option>
                            <option value="Mirput">Mirpur</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="dropdown">
                        <p>Area</p>
                        <select name="area" id="">
                            <option value="Notunbazar">Notun Bazar</option>
                            <option value="Satarkul">Satarkul</option>
                            <option value="Gulshan1">Gulshan 1</option>
                            <option value="Gulshan2">Gulshan 2</option>
                            <option value="Mirpur1">Mirpur 1</option>
                            <option value="Mirput2">Mirpur 2</option>
                            <option value="uttara1">Uttara Sector 1</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <input type="text" class="form-control mb-2 ms-2" placeholder="Enter address" aria-label="address" name="address" required>
                </div>

            </div>
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control mb-2" placeholder="Number of bed room" aria-label="Number of bed room" name="nbr" required>
                </div>
                <div class="col">
                    <input type="text" class="form-control mb-2" placeholder="Number of wash room" aria-label="Number of wash room" name="nwr" required>
                </div>
                <div class="col">
                    <input type="text" class="form-control mb-2" placeholder="Number of balcony" aria-label="Number of balcony" name="nb" required>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <input type="text" class="form-control mb-2" placeholder="Rent amount" aria-label="Rent amount" name="ra" required>
                </div>
                <div class="col-5">
                    <p>Select catagory:</p>
                    <input type="checkbox" value="yes" class="m-2" name="family">
                    <P>Family</p>
                    <input type="checkbox" value="yes" class="m-2" name="mbachelor">
                    <p>Male Bechelor</p>
                    <input type="checkbox" value="yes" class="m-2" name="fbachelor">
                    <p>Female Bachelor</p>

                </div>
                <div class="col-3">
                    <p>Status:</p>
                    <input type="radio" name="status" value="r">
                    <p>In rent</p>
                    <input type="radio" name="status" checked value="nr">
                    <p>Not in rent</p>
                </div>

            </div>

            <div>
                <label for="image1">Add home image</label>
                <input type="file" name="myimage" id="image1" required>
                <input type="file" name="2ndpicture" id="image2" required>
                <input type="file" name="3rdpicture" id="image3" required>
            </div>

            <div class="row">
                <div class="col-3">
                    <input type="submit" name="submit" Value="Add" class="bg-success text-white btn mb-2 btn-lg mt-2">
                </div>
                <div class="col">
                    <a href="add.php" class="btn btn-danger dblock mb-2 btn-lg mt-2">Reset</a>
                </div>
            </div>
        </form>
    </div><br>
    <div>
        <?php include('footer.php') ?>
    </div>
</body>

</html>