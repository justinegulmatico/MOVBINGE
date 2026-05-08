<?php
session_start();
include("../data-con/connect.php"); 

if(isset($_POST['submit'])){
    $id = $_SESSION['id']; // Get the current user's ID
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // 1. CHECK IF USERNAME OR EMAIL ALREADY EXISTS (Excluding current user)
    $check_sql = "SELECT * FROM login_cred WHERE (Username = '$username' OR Email = '$email') AND user_id != '$id'";
    $check_result = mysqli_query($con, $check_sql);

    if(mysqli_num_rows($check_result) > 0){
        // 2. IF EXISTS, REDIRECT BACK WITH ERROR
        $error_msg = "Username or Email already exists!";
        header("Location: ../../Front_End/user/update_acc.php?error=" . urlencode($error_msg));
        exit();
    } else {
        // 3. IF CLEAR, UPDATE THE DATABASE
        $update_sql = "UPDATE login_cred SET Username='$username', Email='$email', Pass='$password' WHERE user_id='$id'";
        
        if(mysqli_query($con, $update_sql)){
            $_SESSION['username'] = $username; 
            header("Location: ../../Front_End/user/my_acc.php");
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
    }
}
?>