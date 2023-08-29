<?php
include("nav.php");
include("connection.php");
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
}
$sql = "SELECT image1, house_name, holding_number FROM `homes` WHERE status = 'nr' AND username != '$user'";
$run = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

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
        margin-top: 5px;
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

<body style="background-color: #dfe6e9">
    <!--
    <div>
        <?php session_start();
        if (isset($_SESSION['user'])) {
            echo $_SESSION['user'];
        } ?>
    </div>-->
    <main>
        <div class="container">
            <div class="row">
                <?php
                while ($result = mysqli_fetch_assoc($run)) {
                ?>
                <div class="col-3 m-2">
                    <div class="img">
                        <img class="rounded" src="<?php echo 'images/' . $result["image1"] ?>" alt="Image not found">
                    </div>
                    <div class="row">
                        <p><?php echo 'House Name: ' . $result["house_name"]; ?></p>
                        <form action="details.php" method="POST">
                            <input type="text" value="<?php echo $result['holding_number']; ?>" name="holding_num"
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
    </main><br>
    <?php include("footer.php"); ?>
</body>

</html>