<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link rel="stylesheet" href="../../assets/CSS/backround.css">
    <link rel="stylesheet" href="../../assets/CSS/ui.css">
    <?php include("../../Back_End/auth/user_logged.php");?>
<!--Utilizing the command or logic of user_logged.php -->
</head>

<body>
<!--Creates a navigation bar which is use for easily going to other website/system mechanics -->
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
        <div class="title">MY ACCOUNT</div>
        
        <section class="box">
            <div class="info">
                <div class="acc-group">
                    <label>Username</label>
                    <p><?php echo $username ?></p>
                </div>
                <div class="acc-group">
                    <label>Email Address</label>
                    <p><?php echo $email ?></p>
                </div>
                <div class="acc-group">
                    <label>Password</label>
                    <p>••••••••</p> </div>
            </div>

            <div class="btn-group">
                <a class="btn" href="update_acc.php">Edit Account Details</a>
                <a href="../movies/home.php" class="btn" style="background: #333;">Back to Browse</a>
            </div>
        </section>
    </div>