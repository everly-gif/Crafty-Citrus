<nav class="nav nav-pills p-4 bg-white">
        <div class="mr-auto">
        <a class="navbar-brand nav-link" href="index.php">Women Empowerment</a>
        </div>
        <a class="nav-link" href="index.php">Home</a>
        <a class="nav-link" href="trainings.php">Trainings</a>
        <a class="nav-link" href="shop.php">Shop</a>
        <?php  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        echo '<a class="nav-link" href="login.php">Login</a>';}
        else{
            $id=$_SESSION['user_id'];
            echo '<a class="nav-link" href="profile.php?id='.$id.'">Profile</a><a class="nav-link" href="logout.php">Log out</a>';
        }
        ?>
</nav>