<?php
include(__DIR__ . '/../data-con/connect.php');

session_start();

if (isset($_POST["reg_submit"])) {
    $ruser =$_POST["reg_user"];
    $rpass =$_POST["reg_pass"];
    $remail =$_POST["reg_email"];

    $unique = mysqli_query($con, "SELECT * FROM login_cred WHERE Username = '$ruser' OR Email = '$remail'");
    $message = "";

    if (mysqli_num_rows($unique) > 0) {
        $message = "Username or Email Exist! Try again";
    }
    else {

        $sql = "INSERT INTO login_cred (Username, Pass, Email) VALUES ('$ruser', '$rpass', '$remail')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo "<script type='text/javascript'>
            alert('New data has been saved! Try to log in');
            window.location='../../Front_End/loging/register.php';
            </script>";
        }
        else{
            $message = "Data cannot be saved";
        }
    }
}
?>