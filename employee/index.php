<!DOCTYPE html>
<?php

session_start();

if (!isset($_SESSION['username'])) {
    header('Location: ../login');
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spidey Post | Staff Login</title>
    <link rel="stylesheet" href="../dashboard.css">
</head>

<body>
    <div class="links">
        <ul class="nav-links">
            <li>
                <a href="../index.html">HOME</a>
            </li>
            <li>
                <a href="#">ABOUT</a>
            </li>
            <li>
                <a href="#">CONTACT</a>
            </li>
            <li>
                <a href="../userlogin.html">LOGIN</a>
            </li>
            <li>
                <a href="../signup/index.html">SIGN-UP</a>
            </li>
        </ul>
    </div>
    <b> Employee Dashboard</b>
    <a href="../login/logout.php">Logout</a>
    <br>
    <b>User</b>
    <a href="view_user.php">View</a>
    <a href="update_view_user.php">Update</a>
    <a href="search_user.php">Search</a>
    <br>
    <b>Tracking</b>
    <a href="view_tracking.php">View</a>
    <a href="add_tracking.html">Add</a>


    <div class="main">
        <div class="greatuser">
            <h1>Welcome <?php echo $_SESSION['username']; ?></h1>
            <h3>Spidey Post Employee Dashboard</h3>
        </div>
</body>

</html>