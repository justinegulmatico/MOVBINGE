<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Account</title>
    <link rel="stylesheet" href="../../assets/CSS/backround.css">
    <link rel="stylesheet" href="../../assets/CSS/ui.css">
    <?php include("../../Back_End/auth/user_logged.php");?>
    <!--Including/reading user_logged.php located in the backend folder-->
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <a href="../movies/home.php" class="home"><h1>MOVBINGE</h1></a>
        </div>
        <ul>
            <li><a href="my_acc.php"><?php echo $username?></a></li>
            <li><a href="acc_contribution.php">My Contributions</a></li>
            <li><a href="../../Back_End/auth/logout.php" onclick="return confirm('Are you sure to log out?');">Log Out</a></li>
        </ul>
    </nav>

    <div class="container">
        <div class="title">UPDATE ACCOUNT</div>
        
        <section class="box">
            <!--Checks error -->
            <?php if(isset($_GET['error'])): ?>
                <div class="error-mes">
                    <p><?php echo htmlspecialchars($_GET['error']); ?></p>
                </div>
            <?php endif; ?>
            <!--Uses post method in order to receive and stores input which is done in the edit_acc.php pa -->
            <form action="../../Back_End/actions/edit_acc.php" method="POST">
                <div class="info">
                    <div class="acc-group">
                        <label>Username</label>
                        <input type="text" name="username" value="<?php echo $username ?>" required>
                    </div>
                    <div class="acc-group">
                        <label>Email</label>
                        <input type="email" name="email" value="<?php echo $email ?>" required>
                    </div>
                    <div class="acc-group">
                        <label>Password</label>
                        <input type="text" name="password" value="<?php echo $pass ?>" required>
                    </div>
                </div>

                <div class="btn-group">
                    <input class="btn" type="submit" name="submit" value="Submit">
                    <a href="my_acc.php" class="btn" style="background-color: #333;">Go Back</a>
                </div>
            </form>
        </section>
    </div>
</body>