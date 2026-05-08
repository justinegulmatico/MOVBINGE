<?php
include("login_process.php");

    if (!isset($_SESSION['id'])) {
        header('Location: ../../Front_End/loging/login.php');
    }

    $id = $_SESSION['id'];

    $user_sql = "SELECT * FROM login_cred WHERE user_id = $id";
    $user_result = mysqli_query($con, $user_sql);

    if ($row = mysqli_fetch_array($user_result)){
        $username = $row["Username"];
        $pass = $row["Pass"];
        $email = $row["Email"];
    }

    if (isset($_POST["log_out"])) {
        session_unset();
        session_destroy();

        header("Location: ../../Front_End/loging/login.php");
    }

?>