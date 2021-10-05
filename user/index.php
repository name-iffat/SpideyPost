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
    <title>Spidey Post | Customer Dashboard</title>
    <link rel="stylesheet" href="../dashboard.css">

</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <img width="40px" src="../spideyPost.png" alt="">
                <span class="logoname"> SPIDEYPOST</span>
            </div>
            <b> Customer Dashboard</b>
            <a href="../login/logout.php">Logout</a>
            <br>
            <b>User</b>
            <a href="view_user.php">View</a>
            <br>
            <b>Tracking</b>
            <a href="view_tracking.php">View</a>
            <div class="account">
                <div class="greatinguser">
                    <h1>Welcome</h1> <span class="name"><?php echo $_SESSION['username']; ?></span>
                    <h3>Spidey Post Customer Dashboard</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="container-body">
        <div class="sidebar">
            <ul>
                <b>User</b>
                <li class="dashboard">
                    <i class="fa fa-dahscube"></i>
                    <a href="view_user.php">View</a>
                </li>
                <b>Tracking</b>
                <li class="dashboard">
                    <i class="fa fa-dahscube"></i>
                    <a href="view_tracking.php">View</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-body">
        <div class="tittle">
            <span class="greeting">
                <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
                <h2>Overview</h2>

                <div class="cards">
                    <div class="row row-1">
                        <div class="col">

                        </div>
                    </div>
                </div>
            </span>
            </span>
        </div>
    </div>
</body>

</html>