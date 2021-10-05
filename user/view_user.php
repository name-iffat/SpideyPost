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
            <h3> <?php echo ucwords(strtolower($_SESSION['username'])); ?> Personal Data</h3>

            <?php
            $username = $_SESSION['username'];
            $query = "SELECT * FROM customer where custName = '$username' ";
            $result = mysqli_query($dbconn, $query) or die("Error: " . mysqli_error($dbconn));
            $numrow = mysqli_num_rows($result);
            ?>

            <table class="tableContent" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th width="3%">No</td>
                        <th width="5px">ID</td>
                        <th width="26%">Name</td>
                        <th width="8%">Gender</td>
                        <th width="35%">Address</td>
                        <th width="9%">Telephone</td>
                        <th colspan="2">Action</td>
                    </tr>
                </thead>

                <?php
                for ($a = 0; $a < $numrow; $a++) {
                    $row = mysqli_fetch_array($result);

                ?>
                    <tbody>
                        <tr>
                            <td>&nbsp;<?php echo $a + 1; ?></td>
                            <td>&nbsp;<?php echo ucwords(strtolower($row['custID'])); ?></td>
                            <td>&nbsp;<?php echo ucwords(strtolower($row['custName'])); ?></td>
                            <td>&nbsp;<?php if ($row['gender'] == 1) {
                                            echo 'Male';
                                        } else {
                                            echo 'Female';
                                        } ?></td>
                            <td><?php echo ucwords(strtolower($row['custAddress'])); ?></td>
                            <td>&nbsp;<?php echo $row['custContact']; ?></td>
                            <td width="5%">&nbsp;&nbsp;<a class="one" href="detail_user.php?user=<?php echo $username; ?>">Detail</a></td>
                        </tr>
                    </tbody>
                <?php
                    if ($numrow == 0) {
                        echo '<tbody>
                            <tr>
    				        <td colspan="7"><font color="#FF0000">No record available.</font></td>
 			        </tr>
                     </tbody>';
                    }
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>