<?php
include("connection.php");
$sql = "SELECT image1, house_name, house_num FROM `homes` WHERE status = 'nr'";
$run = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
< lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <style>
        img {
            width: 100%;
            height: 100%;
        }

        .img {
            width: 100%;
            height: 80%;
        }

        .col-3 {
            height: 300px;
        }

        .btn {
            text-align: right;
        }
        </style>
    </head>

    <>
        <div class="header">
            <?php include("nav.php"); ?>
        </div>

        <main>
            <div class="container">
                <div class="row">
                    <?php
                while ($result = mysqli_fetch_assoc($run)) {
                ?>
                    <div class="col-3 m-2">
                        <div class="img">
                            <img class="rounded" src="<?php echo 'images/' . $result["image1"] ?>"
                                alt="Image not found">
                        </div>
                        <div class="row">
                            <p><?php echo 'House Name: ' . $result["house_name"]; ?></p>
                            <form action="details.php" method="POST">
                                <input type="text" value="<?php echo $result['house_num']; ?>" name="house_number"
                                    hidden>
                                <input type="submit" value="View Details" name="submit" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                    <?php
                }
                ?>
                </div>
            </div>
        </main>
        <footer>
            <?php include("footer.php"); ?>
        </footer>
        </body>

        </html>