<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Movie Details</title>
    <link rel="stylesheet" href="../../assets/CSS/backround.css">
    <link rel="stylesheet" href="../../assets/CSS/ui.css">
    <link rel="stylesheet" href="../../assets/CSS/view.css">
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
        <div class="box" style="width: 100%; max-width: 800px; padding: 50px;">
<!--For retrieving of data which is recorded in the system, specifically movie details -->
            <?php
                include("../../Back_End/data-con/connect.php");

                if (isset($_GET['id'])) {
                    $movie_id = mysqli_real_escape_string($con, $_GET['id']);

                    $sql = "SELECT movies.*, login_cred.username 
                            FROM movies 
                            LEFT JOIN login_cred ON movies.user_id = login_cred.user_id 
                            WHERE movies.movies_id = '$movie_id'";
                            
                    $result = mysqli_query($con, $sql);

                    if ($row = mysqli_fetch_assoc($result)) {
            ?>

                <div class="movie-header">
                    <h1 class="movie-title-big"><?php echo $row['title']; ?></h1>
                    <span style="color: #ccc; font-size: 1.2rem;">(<?php echo $row['year']; ?>)</span>
                </div>

                <div class="detail-list">
                    
                    <div class="movie-detail-row">
                        <span class="label">Genre</span>
                        <span class="value"><?php echo $row['genre']; ?></span>
                    </div>

                    <div class="movie-detail-row">
                        <span class="label">Director</span>
                        <span class="value"><?php echo !empty($row['director']) ? $row['director'] : "N/A"; ?></span>
                    </div>

                    <div class="movie-detail-row">
                        <span class="label">Cast</span>
                        <span class="value"><?php echo !empty($row['cast']) ? $row['cast'] : "N/A"; ?></span>
                    </div>

                    <div class="movie-detail-row">
                        <span class="label">Uploaded By</span>
                        <span class="value" style="color: #e50914; font-weight: bold;">
                            <?php echo !empty($row['username']) ? $row['username'] : "Unknown User"; ?>
                        </span>
                    </div>

                    <div class="movie-detail-row">
                        <span class="label">Description</span>
                        <span class="value" style="text-align: justify;">
                            <?php echo $row['description']; ?>
                        </span>
                    </div>

                </div>

                <div class="btn-group" style="margin-top: 40px; flex-direction: row; justify-content: center; gap: 20px;">
                    <a href="home.php" class="btn" style="background: transparent; border: 1px solid white;">GO BACK</a>
                    
                    <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $row['user_id']): ?>
                        <a href="updatemovie.php?id=<?php echo $row['movies_id']; ?>" class="btn">EDIT MOVIE</a>
                    <?php endif; ?>
                </div>

            <?php
                    }
                } else {
                    echo "<h2 style='color:white; text-align:center;'>No movie selected.</h2>";
                }
            ?>
        </div>
    </div>
</body>