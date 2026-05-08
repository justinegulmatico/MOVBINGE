<?php
session_start();
session_unset();
session_destroy();
header("Location: ../../Front_End/loging/login.php"); 
exit();
?>