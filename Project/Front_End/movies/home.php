<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../../assets/CSS/backround.css">
    <link rel="stylesheet" href="../../assets/CSS/ui.css">
    <?php include("../../Back_End/auth/user_logged.php");?>
    
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <a href="home.php" class="home"><h1>MOVBINGE</h1></a>
        </div>
        <ul>
            <li><a href="../user/my_acc.php"><?php echo $username?></a></li>
            <li><a href="../user/acc_contribution.php">My Contributions</a></li>
            <li><a href="../../Back_End/auth/logout.php" onclick="return confirm('Are you sure to log out?');">Log Out</a></li>
        </ul>
    </nav>

    <div class="container">
        <div style="text-align: center; width: 100%; max-width: 800px; margin-bottom: 20px;">
            <h1 class="title">MOVIE LIST</h1>
            <form class="search" method="GET">
                <input type="text" name="search" placeholder="Search Movies" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>">
                <input type="submit" value="Search">
            </form>
        </div>

        <section class="movie-list">
<!--logic for searching movies through title -->
            <?php
                include("../../Back_End/data-con/connect.php");
                $search = "";

                if (isset($_GET['search'])) {
                    $search = mysqli_real_escape_string($con, $_GET['search']);
                }

                if (!empty($search)) {
                    $sql = "SELECT * FROM movies 
                            WHERE title LIKE '%$search%' 
                               OR genre LIKE '%$search%' 
                               OR year LIKE '%$search%'
                            ORDER BY title ASC";
                } else {
                    $sql = "SELECT * FROM movies ORDER BY title ASC";
                }

                $result = mysqli_query($con, $sql);

                // --- LOGIC: Check if we have results BEFORE creating the table ---
                if (mysqli_num_rows($result) > 0) {
            ?>

            <table>
                <tr>
                    <th>Movie Name</th>
                    <th>Year</th>
                    <th>Genre</th>
                    <th class="desc">Description</th>
                    <th>Action</th>
                </tr>

                <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td style="font-weight: bold;"><?php echo $row['title']?></td>
                        <td><?php echo $row['year']?></td>
                        <td style="color: #ccc;"><?php echo $row['genre']?></td>
                        <td class="desc" style="max-width: 300px;"><?php echo $row['description']?></td>
                        <td>
                            <a href="view_mov.php?id=<?php echo $row['movies_id']; ?>">
                                <input type="button" class="view" value="VIEW">
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </table>

            <?php 
                } else { 
                    // --- EMPTY STATE: Show this if no movies found ---
            ?>
                <div class="box" style="margin-top: 20px; text-align: center; padding: 40px;">
                    <?php if(!empty($search)) { ?>
                        <h2 style="color: #fff; margin-bottom: 10px;">No matches found</h2>
                        <p style="color: #ccc; margin-bottom: 20px;">We couldn't find any movie matching "<?php echo htmlspecialchars($search); ?>"</p>
                        <a href="home.php" class="btn" style="min-width: 150px;">Clear Search</a>
                    <?php } else { ?>
                        <h2 style="color: #fff;">There are no movies yet.</h2>
                        <div style="display: flex; justify-content: center; margin-top: 20px;">
                            <a href="add_mov.php" class="btn">ADD NEW MOVIE</a>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            
        </section>  
    </div>
</body>