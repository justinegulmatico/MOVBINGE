<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="../../assets/CSS/backround.css">
    <link rel="stylesheet" href="../../assets/CSS/log-reg.css">
</head>
<body>
    <div class="container">
        <div class="title"><h1>MOVBINGE</h1></div>
        <div class="wind-float">
            <h1>LOG IN</h1>
            <?php include("../../Back_End/auth/login_process.php");

            //Checks username or password validity when logging in
                if(!empty($message)) : ?>
                <div class="error-mes">
                    <p><?php echo $message; ?></p>
                </div>
            <?php endif; ?>
            <form action="" method="post">
                <div class="input-group">
                    <label for="user">Username: </label>
                    <input type="text" id="user" name="log_user" placeholder="Input Username" required>
                </div>
                
                <div class="input-group">
                    <label for="pass">Password: </label>
                    <input type="password" id="pass" name="log_pass" placeholder="Input Password" required>
                </div>
                <div class="btn-group">
                    <input class="btn" type="submit" name="log_submit" value="Submit">
                </div>
            </form>
                <div class="sign-up">
                    <p>Don't have account? <a href="register.php">Sign Up</a></p>
                </div>
        </div>
    </div>
</body>