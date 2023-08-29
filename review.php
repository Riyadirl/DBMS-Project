<?php
include("connection.php");
include("nav.php");
if(!isset($_SESSION['user'])){
    echo "<script>alert('Please login first');
    document.location='index.php'</script>";
} 
$user = $_SESSION['user'];
$sql = "SELECT username, holding_number FROM rents WHERE username = '$user'";
$run = mysqli_query($conn, $sql);
if($run){
    $result = mysqli_fetch_assoc($run);
    $holding_number = $result['holding_number'];
}
if($result == NULL){
    echo "<script>alert('You do not rent any home');
    document.location='index.php';
    </script>";
}
$sql = "SELECT house_name FROM homes WHERE holding_number = '$holding_number'";
$run = mysqli_query($conn, $sql);
if($run){
    $result = mysqli_fetch_assoc($run);
    $house_name = $result['house_name'];
}
if(isset($_POST['submit'])){
    $review = $_POST['review'];
    $sql = "SELECT review FROM reviews WHERE username = '$user' AND holding_number = $holding_number";
    $run = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($run);
    if($result != NULL){
        echo "<script>alert('As you already add a review you only can edit it naw. please type your review and press edit button to edit it'); document.location='review.php';</script>";
    }
    $sql = "INSERT INTO `reviews`(`username`, `holding_number`, `review`) VALUES ('$user','$holding_number','$review')";
    $run = mysqli_query($conn, $sql);
    if($run){
        $_SESSION['holding_number'] = $holding_number;
        echo "<script>alert('Review added successfully');
        document.location ='details.php'</script>";
    }
}
if(isset($_POST['modify'])){
    $review = $_POST['review'];
    $sql = "UPDATE reviews SET review = '$review' WHERE username = '$user' AND holding_number = $holding_number";
    $run = mysqli_query($conn, $sql);
    if($run){
        $_SESSION['holding_number'] = $holding_number;
        echo "<script>document.location ='details.php'</script>";
    }
}
if(isset($_POST['leave'])){
    $sql = "UPDATE homes SET status = 'nr' WHERE holding_number = $holding_number";
    $sql1 = "DELETE FROM `rents` WHERE username = '$user' AND holding_number = $holding_number";
    $run = mysqli_query($conn, $sql);
    $run = mysqli_query($conn, $sql1);
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review</title>
</head>

<body style="background-color: #dfe6e9">
    <div class="container">
        <form action="review.php" method="POST" class="form">
            <label for="" class="form-control bg-dark text-white"><?php echo 'House Name:- '.$house_name ?></label>
            <textarea class="form-control mt-5 mb-5" name="review" placeholder="Type your review here"></textarea>
            <div class="row">
                <div class="col-4">
                    <input type="submit" class="form-control btn btn-success" name="submit" value="Add Review">
                </div>
                <div class="col-4">
                    <input type="submit" class="form-control btn btn-info" name="modify" value="Edit Review">
                </div>
                <div class="col-4">
                    <input type="submit" class="form-control btn btn-danger" name="leave" value="Leave Home">
                </div>
            </div>
        </form>
    </div>
    <?php include("footer.php"); ?>
</body>

</html>