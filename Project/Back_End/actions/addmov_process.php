<?php
include(__DIR__ . '/../data-con/connect.php');
session_start();

if(isset($_POST["madd"]))
{
    $mtitle = $_POST['mtitle'];
    $mgenre = $_POST['mgenre'];
    $myear  = $_POST['myear'];
    $mdir   = $_POST['mdir'];
    $mcast  = $_POST['mcast'];
    $mdesc  = $_POST['mdesc'];
    

    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        $user_id = $_POST['user_id'];
    }

    $sql = "INSERT INTO movies (title, genre, year, director, cast, description, user_id) 
            VALUES ('$mtitle', '$mgenre', '$myear', '$mdir', '$mcast', '$mdesc', '$user_id')";

    $res = mysqli_query($con, $sql);

    if($res)
    {
        echo "<script type='text/javascript'>
                alert('New Movie has been saved!');
                window.location='../../Front_End/user/acc_contribution.php';
              </script>";
    }
    else 
    {
        echo "<script type='text/javascript'>
                alert('Error: Data could not be saved. " . mysqli_error($con) . "');
                window.location='../../Front_End/user/acc_contribution.php';
              </script>";
    }
}
else 
{
    header("Location: ../../Front_End/user/acc_contribution.php");
}
?>