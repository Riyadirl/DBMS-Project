<?php 
include("connection.php");
session_start();
if(!isset($_SESSION['user'])){
    echo "<script>alert('Please log in first');
    document.location='index.php';
    </script>";
}
$user = $_SESSION['user'];
$sql = "SELECT balance FROM users WHERE username = '$user'";
$run = mysqli_query($conn, $sql);
if($run){
    $result = mysqli_fetch_assoc($run);
    $balance = $result['balance'];
}
if(isset($_POST['deposit'])){
    $amount = $_POST['amount'];
    $balance += $amount;
    $sql ="UPDATE users SET balance = $balance WHERE username = '$user'";
    $run = mysqli_query($conn, $sql);
    if($run){
        echo "<script>alert('Deposit successfull'); 
        document.location='payment.php'; </script>";
    }
    else{
        echo "<script>alert('Something wrong, please try letter');
        document.location='payment.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit</title>
</head>

<body style="background-color: #dfe6e9">
    <div class="container">
    <?php include("nav.php"); ?>
    <form action="deposit.php" method="POST" class="form">
        <label for="" class="form-control m-2 bg-dark text-white">User:- <?php echo $_SESSION['user']; ?></label>
        <label for="" class="form-control m-2 bg-dark text-white">Old balance is:- <?php echo $balance ?></label>
        <input type="number" class="form-control m-2" placeholder="Enter amount" required name="amount">
        <input type="submit" value="Deposit" name="deposit" class="form-control btn btn-info m-2">
    </form>
    </div>
    <footer>
        <?php include("footer.php"); ?>
    </footer>
</body>

</html>