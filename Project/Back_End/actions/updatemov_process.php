<?php
include(__DIR__ . '/../data-con/connect.php');
session_start();
?>

<?php

if(isset($_POST["update"]))
{
    $currid=$_POST['hiddenID'];
    $mtitle=$_POST['mtitle'];
    $mgenre=$_POST['mgenre'];
    $myear=$_POST['myear'];
    $mdir=$_POST['mdir'];
    $mcast=$_POST['mcast'];
    $mdesc=$_POST['mdesc'];
    $user_id=$_SESSION['id'];

$sqls = "UPDATE `movies` 
SET `title` = '$mtitle',
    `genre` = '$mgenre',
    `year` = '$myear',
    `director` = '$mdir',
    `cast` = '$mcast',
    `description` = '$mdesc',
    `title` = '$mtitle'
    WHERE `movies_id`='$currid' ";


$res = mysqli_query($con,$sqls);

if($res)
    {
        echo"<script type='text/javascript'>
        alert('New data has been saved!');
        window.location='../../Front_End/movies/home.php';
        </script>";
    }
    {
        echo "Data cant be saved!";
    }
}
?>