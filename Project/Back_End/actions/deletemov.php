<?php
include(__DIR__ . '/../data-con/connect.php');
session_start();

if(isset($_GET['id']))
{
    $currid = $_GET['id'];

    $currid = mysqli_real_escape_string($con, $currid);

    $sqls = "DELETE FROM movies WHERE movies_id = '$currid'";
    $res = mysqli_query($con, $sqls);

    if($res)
    {
        echo "<script type='text/javascript'>
                alert('Movie deleted successfully!');
                window.location='../../Front_End/user/acc_contribution.php';
              </script>";
    }
    else
    {
        // Failure
        echo "<script type='text/javascript'>
                alert('Movie could not be deleted.');
                window.location='../../Front_End/user/acc_contribution.php';
              </script>";
    }
}
else
{
    header("Location: ../Front_End/acc_contribution.php");
}
?>