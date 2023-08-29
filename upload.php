<?php 
    include ("connection.php");
    session_start();
    if(isset($_POST['submit'])){
        $image1 = $_FILES['myimage']['name'];
        $image2 = $_FILES['2ndpicture']['name'];
        $image3 = $_FILES['3rdpicture']['name'];
        $tmp_name1 = $_FILES['myimage']['tmp_name'];
        $tmp_name2 = $_FILES['2ndpicture']['tmp_name'];
        $tmp_name3 = $_FILES['3rdpicture']['tmp_name'];
        //image stored end
        $user = $_SESSION['user'];
        $house_name = $_POST['name'];
        $holding_number = $_POST['house_number'];
        //$address = $_POST['address'];
        $nbr = $_POST['nbr'];
        $nwr = $_POST['nwr'];
        $nb = $_POST['nb'];
        $ra = $_POST['ra'];
        $status = $_POST['status'];
        $district = $_POST['district'];
        $sub_district = $_POST['sub_d'];
        $area = $_POST['area'];
        $address = $_POST['address'];
        //category
        $family = $_POST['family'];
        if($family == NULL){
            $family = 'no';
        }
        $mbechelor = $_POST['mbachelor'];
        if($mbechelor == NULL){
            $mbechelor = 'no';
        }
        $fbechelor = $_POST['fbachelor'];
        if($fbechelor == NULL){
            $fbechelor = 'no';
        }
        //sql query
        $sql = "INSERT INTO `homes`(`holding_number`, `username`, `house_name`, `bed_room`, `wash_room`, `balcony`, `image1`, `image2`, `image3`, `rent_amount`, `district`, `sub_district`, `area`, `status`, `address`) VALUES ('$holding_number','$user','$house_name','$nbr','$nwr','$nb','$image1','$image2','$image3','$ra','$district','$sub_district','$area','$status', '$address')";
        $sql1 = "INSERT INTO `categories`(`holding_number`, `family`, `male_bechelor`, `female_bechelor`) VALUES ('$holding_number','$family','$mbechelor','$fbechelor')";
        //run sql query
        $run = mysqli_query($conn, $sql);
        $run1 = mysqli_query($conn, $sql1);
        if($run){
            echo '<script>alert("Home added successfully")</script>';
            
            move_uploaded_file($tmp_name1,'images/'.$image1);
            move_uploaded_file($tmp_name2, 'images/'.$image2);
            move_uploaded_file($tmp_name3, 'images/'.$image3);
            echo "<script>alert('Home add successfully');
            document.location='add.php';</script>";
            //header('location:add.php');
        }
        else{
            echo "Something wrong";
        }
    }
?>