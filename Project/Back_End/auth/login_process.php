<?php
include(__DIR__ . '/../data-con/connect.php');
session_start();

$message = "";
if (isset($_POST["log_submit"])) {
    $luser = $_POST["log_user"];
    $lpass = $_POST["log_pass"];

    $sql = "SELECT * FROM login_cred WHERE Username = '$luser' AND Pass = '$lpass'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $_SESSION["id"] = $row["user_id"];

        header("Location: ../../Front_End/movies/home.php");
    }
    else {
        $message = "Invalid username or password";
    }
} 
?>