<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Movie</title>
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
        <h1 class="title">EDIT MOVIE</h1>

        <div class="box box-wide">
            <?php   
            //updates movie table using the variable $currid, have similarities on how data is added when listing a new movie
            include("../../Back_End/data-con/connect.php");
            
            if (isset($_GET['id'])) {
                $currid = $_GET['id'];
                $sql1 = "SELECT * FROM movies WHERE movies_id = '$currid'"; 
                $result1 = mysqli_query($con, $sql1);

                while($row = mysqli_fetch_assoc($result1)) {
            ?>

            <form action="../../Back_End/actions/updatemov_process.php" method="post">
                <input type="hidden" name="hiddenID" value="<?php echo $currid; ?>">

                <div class="acc-group">
                    <label>Movie Title</label>
                    <input type="text" name="mtitle" value="<?php echo $row['title']; ?>">
                </div>

                <div class="input-row">
                    <div class="acc-group">
                        <label>Genre</label>
                        <input type="text" name="mgenre" value="<?php echo $row['genre']; ?>">
                    </div>
                    <div class="acc-group">
                        <label>Release Year</label>
                        <input type="text" name="myear" value="<?php echo $row['year']; ?>">
                    </div>
                </div>

                <div class="input-row">
                    <div class="acc-group">
                        <label>Director</label>
                        <input type="text" name="mdir" value="<?php echo $row['director']; ?>">
                    </div>
                    <div class="acc-group">
                        <label>Main Cast</label>
                        <input type="text" name="mcast" value="<?php echo $row['cast']; ?>">
                    </div>
                </div>

                <div class="acc-group">
                    <label>Description</label>
                    <input type="text" name="mdesc" value="<?php echo $row['description']; ?>">
                </div>

                <div class="btn-group">
                    <input type="submit" name="update" value="UPDATE MOVIE" class="btn">
                    <a href="../user/acc_contribution.php" style="color: #666; font-size: 0.9rem; text-decoration: none;">Go Back</a>
                </div>
            </form>
            
            <?php
                } 
            } 
            ?>        
        </div>
    </div>
</body>
