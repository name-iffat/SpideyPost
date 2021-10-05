<!DOCTYPE html>
<?php
include('../include/dbconn.php');

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
    <link rel="stylesheet" href="./dashboard.css">
    <title>Spidey Post | Customer Dashboard</title>
</head>

<body>
    <header id="header">
        <a href="#" class="logo">
            <img src="../Sources/Logo.png" alt="Logo">
            <h2>
                <div>Spidey</div> Post
            </h2>
        </a>
        <ul class="navigation">
            <li><a href="../login/logout.php">Logout</a></li>
        </ul>
    </header>
    <div class="container">
        <div class="bar">
            <h1> Customer Dashboard</h1>
        </div>

        <div class="main">
            <div class="greetinguser">
                <h1>Welcome <?php echo $_SESSION['username']; ?></h1>
                <b>User</b>
                <a href="view_user.php">View</a>
                <a href="update_user.php">Update<br></a>
                <div class="track">
                    <b>Tracking</b>
                    <a href="view_tracking.php">View</a>
                </div>
            </div>
        </div>
        <div class="main">
            <h3>Spidey Post Tracking Page</h3>

            <?php
            $username = $_SESSION['username'];
            $query = "SELECT * FROM customer where custName = '$username' ";
            $result = mysqli_query($dbconn, $query) or die("Error: " . mysqli_error($dbconn));
            $row = mysqli_fetch_array($result);

            $cust_id = $row['custID'];
            $query = "SELECT * FROM tracking where custID = '$cust_id' ";
            $result = mysqli_query($dbconn, $query) or die("Error: " . mysqli_error($dbconn));
            $numrow = mysqli_num_rows($result);
            ?>

            <table class="tableContent" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th width="3%">No</td>
                        <th width="26%">Tracking ID</td>
                        <th width="8%">Date</td>
                        <th width="35%">Current Location</td>
                        <th width="9%">Package ID</td>
                        <th width="9%">Customer ID</td>
                        <th width="9%">Branch Name</td>
                        <th colspan="2">Action</td>
                    </tr>
                </thead>

                <?php

                for ($a = 0; $a < $numrow; $a++) {
                    $row = mysqli_fetch_array($result);
                    $package_id = $row['packageID'];
                ?>
                    <tbody>
                        <tr>
                            <td>&nbsp;<?php echo $a + 1; ?></td>
                            <td>&nbsp;<?php echo ucwords(strtolower($row['trackingID'])); ?></td>
                            <td>&nbsp;<?php echo ucwords(strtolower($row['date'])); ?></td>
                            <td><?php echo ucwords(strtolower($row['curLocation'])); ?></td>
                            <td><?php echo ucwords(strtolower($row['packageID'])); ?></td>
                            <td><?php echo ucwords(strtolower($row['custID'])); ?></td>
                            <td><?php echo ucwords(strtolower($row['branchID'])); ?></td>
                            <td width="10%"><a class="one" href="done_tracking.php?trackingID=<?php echo $row['trackingID']; ?>">Done</a></td>

                        </tr>
                    </tbody>
                <?php
                }
                if ($numrow == 0) {
                    echo '<tbody>
                        <tr>
    				    <td colspan="7"><font color="#FF0000">No record available.</font></td>
 			    </tr>
                </tbody>';
                }

                ?>
            </table>
            <!-- Calculate Total Price of package-->
            <?php
            $queryp = "SELECT * FROM package p, tracking t where p.packageID = t.packageID AND custID = '$cust_id'  ";
            $resultp = mysqli_query($dbconn, $queryp) or die("Error: " . mysqli_error($dbconn));
            $numrowp = mysqli_num_rows($resultp);

            $totalPrice = 0;
            for ($a = 0; $a < $numrowp; $a++) {
                $row = mysqli_fetch_array($resultp);
                $totalPrice = $totalPrice + $row['packagePrice'];
            ?>


            <?php
                if ($numrow == 0) {
                    echo '<tbody>
                    <tr>
                    <td colspan="7"><font color="#FF0000">No record available.</font></td>
                </tr>
                </tbody>';
                }
            } ?>
            <td><?php echo ucwords(strtolower("Total Package Price: " . $totalPrice)) ?></td>

        </div>

    </div>
</body>

</html>