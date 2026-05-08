<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../../assets/CSS/backround.css">
    <link rel="stylesheet" href="../../assets/CSS/log-reg.css">
</head>
<body>
    <div class="container">
        <div class="title"><h1>MOVBINGE</h1></div>
        <div class="wind-float">
            <h1>SIGN UP</h1>
<!--Checks if username already exist/taken through register_process.php -->
            <?php include("../../Back_End/auth/register_process.php");
                if(!empty($message)) : ?>
                <div class="error-mes">
                    <p><?php echo $message; ?></p>
                </div>
            <?php endif; ?>
            <form action="" method="post">
                <div class="input-group">
                    <label for="user">Username: </label>
                    <input type="text" id="user" name="reg_user" placeholder="Input Username" required>
                </div>

                <div class="input-group">
                    <label for="email">Email: </label>
                    <input type="email" id="email" name="reg_email" placeholder="Input Email" required>
                </div>
                
                <div class="input-group">
                    <label for="pass">Password: </label>
                    <input type="password" id="pass" name="reg_pass" placeholder="Input Password" required>
                </div>
                <div class="btn-group">
                    <input class="btn" type="submit" name="reg_submit" value="Submit">
                </div>
            </form>
                <div class="sign-up">
                    <p>Do you have an account? <a href="login.php">Log In</a></p>
                </div>
        </div>
    </div>
</body>