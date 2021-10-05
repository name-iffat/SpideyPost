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
    <title>Spidey Post | Employee Dashboard</title>
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

            <h3> <?php echo ucwords(strtolower($_SESSION['username'])); ?> Personal Data</h3>
            <?php
            $username = $_SESSION['username'];
            $query = "SELECT * FROM employee where employeeName = '$username' ";
            $result = mysqli_query($dbconn, $query) or die("Error: " . mysqli_error($dbconn));
            $numrow = mysqli_num_rows($result);
            ?>

            <table class="tableContent" width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <th width="3%">No</td>
                    <th width="26%">Name</td>
                    <th width="8%">Gender</td>
                    <th width="35%">Address</td>
                    <th width="9%">Telephone</td>
                    <th align="center" colspan="2">Action</td>
                </tr>

                <?php
                for ($a = 0; $a < $numrow; $a++) {
                    $row = mysqli_fetch_array($result);
                ?>
                    <tr>
                        <td>&nbsp;<?php echo $a + 1; ?></td>
                        <td>&nbsp;<?php echo ucwords(strtolower($row['employeeName'])); ?></td>
                        <td>&nbsp;<?php if ($row['gender'] == 1) {
                                        echo 'Male';
                                    } else {
                                        echo 'Female';
                                    } ?></td>
                        <td><?php echo ucwords(strtolower($row['employeeAddress'])); ?></td>
                        <td>&nbsp;<?php echo $row['employeeContact']; ?></td>
                        <td width="5%" align="center"><a class="one" href="update_employee.php?user=<?php echo $username; ?>">Edit</a></td>
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
            <br>
            <br>
            <h3>Customer Data</h3>
            <?php
            //$username = $_SESSION['username'];
            $query = "SELECT * FROM customer where level_id !=1 ORDER BY custName ";
            $result = mysqli_query($dbconn, $query) or die("Error: " . mysqli_error($dbconn));
            $numrow = mysqli_num_rows($result);
            ?>

            <table class="tableContent" width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <th width="3%">No</td>
                    <th width="26%">Name</td>
                    <th width="8%">Gender</td>
                    <th width="35%">Address</td>
                    <th width="9%">Telephone</td>
                    <th align="center" colspan="2">Action</td>
                </tr>

                <?php
                for ($a = 0; $a < $numrow; $a++) {
                    $row = mysqli_fetch_array($result);

                ?>
                    <tr>
                        <td>&nbsp;<?php echo $a + 1; ?></td>
                        <td>&nbsp;<?php echo ucwords(strtolower($row['custName'])); ?></td>
                        <td>&nbsp;<?php if ($row['gender'] == 1) {
                                        echo 'Male';
                                    } else {
                                        echo 'Female';
                                    } ?></td>
                        <td><?php echo ucwords(strtolower($row['custAddress'])); ?></td>
                        <td>&nbsp;<?php echo $row['custContact']; ?></td>
                        <td width="5%" align="center"><a class="one" href="update_user.php?custID=<?php echo $row['custID']; ?>">Edit</a></td>
                        <td width="5%" align="center"><a class="one" href="delete_user.php?custID=<?php echo $row['custID']; ?>">Delete</a></td>
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