<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Movie</title>
    <link rel="stylesheet" href="../../assets/CSS/backround.css">
    <link rel="stylesheet" href="../../assets/CSS/ui.css">
    <?php include("../../Back_End/auth/user_logged.php"); ?>
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <a href="home.php" class="home"><h1>MOVBINGE</h1></a>
        </div>
        <ul>
            <li><a href="../user/my_acc.php"><?php echo $username; ?></a></li>
            <li><a href="../user/acc_contribution.php">My Contributions</a></li>
            <li><a href="../../Back_End/auth/logout.php" onclick="return confirm('Are you sure to log out?');">Log Out</a></li>
        </ul>
    </nav>

    <div class="container">
        <h1 class="title">ADD NEW MOVIE</h1>

        <div class="box box-wide">
            <form action="../../Back_End/actions/addmov_process.php" method="post">
                
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?? $id; ?>">

                <div class="acc-group">
                    <label>Movie Title</label>
                    <input type="text" name="mtitle" placeholder="Enter movie title" required>
                </div>

                <div class="input-row">
                    <div class="acc-group">
                        <label>Genre</label>
                        <input type="text" name="mgenre" placeholder="e.g. Action, Horror" required>
                    </div>
                    <div class="acc-group">
                        <label>Release Year</label>
                        <input type="number" name="myear" placeholder="e.g. 2024" required>
                    </div>
                </div>

                <div class="input-row">
                    <div class="acc-group">
                        <label>Director</label>
                        <input type="text" name="mdir" placeholder="Director's name">
                    </div>
                    <div class="acc-group">
                        <label>Main Cast</label>
                        <input type="text" name="mcast" placeholder="Main actors">
                    </div>
                </div>

                <div class="acc-group">
                    <label>Description</label>
                    <input type="text" name="mdesc" placeholder="Short plot summary">
                </div>

                <div class="btn-group">
                    <input type="submit" name="madd" value="ADD MOVIE" class="btn">
                    <a href="../user/acc_contribution.php" style="color: #666; font-size: 0.9rem; text-decoration: none;">Cancel</a>
                </div>

            </form>     
        </div>
    </div>
</body>