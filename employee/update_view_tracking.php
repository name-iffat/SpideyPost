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
    <title>Spidey Post | Tracking Dashboard</title>
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
            <h1> Employee Dashboard</h1>
        </div>
        <div class="main">
            <div class="greetinguser">
                <h1>Welcome <?php echo $_SESSION['username']; ?></h1>
                <b>User</b>
                <a href="view_user.php">View</a>
                <a href="update_view_user.php">Update</a>
                <a href="search_user.php">Search</a>
                <div class="track">
                    <b>Tracking</b>
                    <a href="view_tracking.php">View</a>
                    <a href="add_tracking.php">Add</a>
                    <a href="update_view_tracking.php">Update</a>
                </div>

            </div>
        </div>






        <div class="main">

            <h3> Spidey Post Tracking Page</h3>
            <?php
            $custName = $_SESSION['username'];
            $query = "SELECT * FROM tracking ORDER BY trackingID";
            $result = mysqli_query($dbconn, $query) or die("Error: " . mysqli_error($dbconn));
            $numrow = mysqli_num_rows($result);
            ?>

            <table class="tableContent" width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <th width="3%">No</td>
                    <th width="26%">Tracking ID</td>
                    <th width="8%">Date</td>
                    <th width="35%">Current Location</td>
                    <th width="9%">Package ID</td>
                    <th width="9%">Customer ID</td>
                    <th width="9%">Branch Name</td>
                    <th align="center" colspan="2">Action</td>
                </tr>

                <?php
                for ($a = 0; $a < $numrow; $a++) {
                    $row = mysqli_fetch_array($result);

                ?>
                    <tr>
                        <td>&nbsp;<?php echo $a + 1; ?></td>
                        <td>&nbsp;<?php echo ucwords(strtolower($row['trackingID'])); ?></td>
                        <td>&nbsp;<?php echo ucwords(strtolower($row['date'])); ?></td>
                        <td><?php echo ucwords(strtolower($row['curLocation'])); ?></td>
                        <td><?php echo ucwords(strtolower($row['packageID'])); ?></td>
                        <td><?php echo ucwords(strtolower($row['custID'])); ?></td>
                        <td><?php echo ucwords(strtolower($row['branchID'])); ?></td>
                        <td width="10%" align="center"><a class="one" href="update_tracking.php?trackingID=<?php echo $row['trackingID']; ?>">Edit</a></td>
                        <td width="10%" align="center"><a class="one" href="delete_tracking.php?trackingID=<?php echo $row['trackingID']; ?>">Delete</a></td>


                    </tr>
                <?php
                    if ($numrow == 0) {
                        echo '<tr>
    				    <td colspan="7"><font color="#FF0000">No record available.</font></td>
 			        </tr>';
                    }
                }
                ?>
            </table>






        </div>
    </div>
</body>

</html>