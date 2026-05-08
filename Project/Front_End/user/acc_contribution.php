<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Contributions</title>
    <link rel="stylesheet" href="../../assets/CSS/backround.css">
    <link rel="stylesheet" href="../../assets/CSS/ui.css">
    <?php include("../../Back_End/auth/user_logged.php"); ?>
    <!--Utilizing the command or logic of user_logged.php -->
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <a href="../movies/home.php" class="home"><h1>MOVBINGE</h1></a>
        </div>
        <ul>
            <li><a href="my_acc.php">
                <?php echo $username?>
            </a>
            </li>
            <li><a href="acc_contribution.php">My Contributions</a></li>
            <li><a href="../../Back_End/auth/logout.php" onclick="return confirm('Are you sure to log out?');">Log Out</a></li>
        </ul>
    </nav>

    <div class="container">
        <div class="">
            <h1 class="title">MY CONTRIBUTIONS</h1>
            
            <div style="display: flex; justify-content: center; margin-bottom: 20px;">
                <a href="../movies/add_mov.php" class="btn">ADD NEW MOVIE</a>
            </div>

            <form class="search" method="GET">
                <input type="text" name="search" placeholder="Search Your Movies" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>">
                <input type="submit" value="Search">
            </form>
        </div>

        <section class="movie-list">
            <?php
                include("../../Back_End/data-con/connect.php");
    
                // We ensure $current_user_id always has a value
                if(isset($_SESSION['user_id'])){
                    $current_user_id = $_SESSION['user_id'];
                } elseif(isset($id)) { 
                    // Fallback if your user_logged.php uses $id instead
                    $current_user_id = $id; 
                } else {
                    $current_user_id = 0;
                }
                
                $search = "";

                if (isset($_GET['search'])) {
                    $search = mysqli_real_escape_string($con, $_GET['search']);
                }

                // (Fixed variable names)
                if (!empty($search)) {
                    $sql = "SELECT * FROM movies 
                            WHERE user_id = '$current_user_id' 
                            AND (title LIKE '%$search%' 
                                OR genre LIKE '%$search%' 
                                OR year LIKE '%$search%')
                            ORDER BY title ASC";
                } else {
                    // FIX IS HERE: Changed '$id' to '$current_user_id'
                    $sql = "SELECT * FROM movies 
                            WHERE user_id = '$current_user_id' 
                            ORDER BY title ASC";
                }

                $result = mysqli_query($con, $sql);
                
                // 3. DISPLAY LOGIC
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
                        <td><?php echo $row['title']?></td>
                        <td><?php echo $row['year']?></td>
                        <td><?php echo $row['genre']?></td>
                        <td class="desc"><?php echo $row['description']?></td>
                        <td>
                            <a href="../movies/updatemovie.php?id=<?php echo $row['movies_id']?>"><input type="button" class="update" value="UPDATE"></a>
                            <a href="../../Back_End/actions/deletemov.php?id=<?php echo $row['movies_id']; ?>" onclick="return confirm('Are you sure you want to delete this movie?');"> <input type="button" class="delete" value="DELETE"></a>
                        </td>
                    </tr>
                <?php } ?>
            </table>

            <?php 
                } else { 
                    // Handle Empty States
                    if (!empty($search)) {
            ?>
                        <div class="box" style="margin-top: 20px;">
                            <p style="text-align: center; color: white;">No results found for "<?php echo htmlspecialchars($search); ?>"</p>
                            <div style="text-align: center; margin-top: 10px;">
                                <a href="acc_contribution.php" class="btn" style="min-width: 100px; padding: 5px 10px;">Clear Search</a>
                            </div>
                        </div>
            <?php 
                    } else { 
            ?>
                        <div class="box" style="margin-top: 20px;">
                            <p style="text-align: center; color: white;">You haven't contributed any movies yet.</p>
                        </div>
            <?php 
                    }
                } 
            ?>
        </section>  
    </div>
</body>