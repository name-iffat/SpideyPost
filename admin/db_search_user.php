<!DOCTYPE html>
<?php
include('../include/dbconn.php');

session_start();

if (!isset($_SESSION['username'])) {
    header('Location: ../login');
}
/* capture search_name */
$namesearch = $_POST['search_name'];

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dashboard.css">
    <title>Spidey Post | Admin Login</title>
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
            <h1> Admin Dashboard</h1>
        </div>
        <div class="greetinguser">
            <h1>Welcome <?php echo $_SESSION['username']; ?></h1>
            <b>Employee</b>
            <a href="../admin/add_emp.php">Add</a>
            <br><br>
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
            <div class="container1">

                <h3>Search User Data </h3>

                <fieldset>


                    <b>Customer Data</b>
                    <?php
                    /* execute SQL statement */
                    $query = "(SELECT * FROM customer WHERE custName LIKE '%$namesearch%' AND level_id != 1)";
                    $result = mysqli_query($dbconn, $query) or die("Error: " . mysqli_error($dbconn));
                    $numrow = mysqli_num_rows($result);

                    ?>
                    <tr align="left" bgcolor="#f2f2f2">
                        <td>
                            <table class="tableContent" width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <th width="3%">No
                        </td>
                        <th width="26%">Name</td>
                        <th width="8%">Gender</td>
                        <th width="27%">Address</td>
                        <th width="9%">Telephone</td>
                        <th align="center" colspan="3">Action</td>
                    </tr>

                    <?php
                    $color = "1";

                    for ($a = 0; $a < $numrow; $a++) {
                        $row = mysqli_fetch_array($result);

                        if ($color == 1) {
                            echo "<tr>"
                    ?>
                            <td>&nbsp;<?php echo $a + 1; ?></td>
                            <td>&nbsp;<?php
                                        echo ucwords(strtolower($row['custName']));
                                        ?></td>
                            <td>&nbsp;<?php if ($row['gender'] == 1) {
                                            echo 'Male';
                                        } else {
                                            echo 'Female';
                                        } ?></td>
                            <td><?php
                                echo ucwords(strtolower($row['custAddress']));
                                ?></td>
                            <td>&nbsp;<?php
                                        echo $row['custContact']; ?></td>
                            <td width="5%" align="center"><a class="one" href="detail_user.php?custID=<?php echo $row['custID']; ?>">Detail</a></td>
                            <td width="5%" align="center"><a class="one" href="update_user.php?custID=<?php echo $row['custID']; ?>">Edit</a></td>
                            <td width="5%" align="center"><a class="one" href="delete_user.php?custID=<?php echo $row['custID']; ?>">Delete</a></td>

                            </tr>
                        <?php
                            $color = "2";
                        } else {
                            echo "<tr>"
                        ?>
                            <td>&nbsp;<?php echo $a + 1; ?></td>
                            <td>&nbsp;<?php
                                        echo ucwords(strtolower($row['custName']));
                                        ?></td>
                            <td>&nbsp;<?php if ($row['gender'] == 1) {
                                            echo 'Male';
                                        } else {
                                            echo 'Female';
                                        } ?></td>
                            <td><?php
                                echo ucwords(strtolower($row['custAddress']));
                                ?></td>
                            <td>&nbsp;<?php
                                        echo $row['custContact']; ?></td>
                            <td width="5%" align="center"><a class="one" href="detail_user.php?custID=<?php echo $row['custID']; ?>">Detail</a></td>
                            <td width="5%" align="center"><a class="one" href="update_user.php?custID=<?php echo $row['custID']; ?>">Edit</a></td>
                            <td width="5%" align="center"><a class="one" href="delete_user.php?custID=<?php echo $row['custID']; ?>">Delete</a></td>

                            </tr>
                    <?php
                            $color = "1";
                        }
                    }
                    if ($numrow == 0) {
                        echo '<tr>
                        <td colspan="8"><font color="#FF0000">No record available.</font></td>
                </tr>';
                    }
                    ?>
                    </table>

                </fieldset>
                <fieldset>
                    <b>Employee Data</b>
                    <?php

                    /* execute SQL statement */
                    $query2 = "(SELECT * FROM employee WHERE employeeName LIKE '%$namesearch%' AND level != 1)";
                    $result2 = mysqli_query($dbconn, $query2) or die("Error: " . mysqli_error($dbconn));
                    $numrow2 = mysqli_num_rows($result2);

                    ?>
                    <tr>
                        <td>
                            <table class="tableContent" width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <th width="3%">No
                        </td>
                        <th width="26%">Name</td>
                        <th width="8%">Gender</td>
                        <th width="27%">Address</td>
                        <th width="9%">Telephone</td>
                        <th align="center" colspan="3">Action</td>
                    </tr>

                    <?php
                    $color = "1";

                    for ($a = 0; $a < $numrow2; $a++) {
                        $row2 = mysqli_fetch_array($result2);

                        if ($color == 1) {
                            echo "<tr>"
                    ?>
                            <td>&nbsp;<?php echo $a + 1; ?></td>
                            <td>&nbsp;<?php
                                        echo ucwords(strtolower($row2['employeeName']));
                                        ?></td>
                            <td>&nbsp;<?php if ($row2['gender'] == 1) {
                                            echo 'Male';
                                        } else {
                                            echo 'Female';
                                        } ?></td>
                            <td><?php
                                echo ucwords(strtolower($row2['employeeAddress']));
                                ?></td>
                            <td>&nbsp;<?php
                                        echo $row2['employeeContact']; ?></td>
                            <td width="5%" align="center"><a class="one" href="detail_employee.php?employeeID=<?php echo $row2['employeeID']; ?>">Detail</a></td>
                            <td width="5%" align="center"><a class="one" href="update_employee.php?employeeID=<?php echo $row2['employeeID']; ?>">Edit</a></td>
                            <td width="5%" align="center"><a class="one" href="delete_employee.php?employeeID=<?php echo $row2['employeeID']; ?>">Delete</a></td>

                            </tr>
                        <?php
                            $color = "2";
                        } else {
                            echo "<tr>"
                        ?>
                            <td>&nbsp;<?php echo $a + 1; ?></td>
                            <td>&nbsp;<?php
                                        echo ucwords(strtolower($row2['employeeName']));
                                        ?></td>
                            <td>&nbsp;<?php if ($row2['gender'] == 1) {
                                            echo 'Male';
                                        } else {
                                            echo 'Female';
                                        } ?></td>
                            <td><?php
                                echo ucwords(strtolower($row2['employeeAddress']));
                                ?></td>
                            <td>&nbsp;<?php
                                        echo $row2['employeeContact']; ?></td>
                            <td width="5%" align="center"><a class="one" href="detail_employee.php?employeeID=<?php echo $row2['employeeID']; ?>">Detail</a></td>
                            <td width="5%" align="center"><a class="one" href="update_employee.php?employeeID=<?php echo $row2['employeeID']; ?>">Edit</a></td>
                            <td width="5%" align="center"><a class="one" href="delete_employee.php?employeeID=<?php echo $row2['employeeID']; ?>">Delete</a></td>

                            </tr>
                    <?php
                            $color = "1";
                        }
                    }
                    if ($numrow2 == 0) {
                        echo '<tr>
                        <td colspan="8"><font color="#FF0000">No record available.</font></td>
                </tr>';
                    }
                    ?>
                    </table>
                </fieldset>
            </div>
        </div>
</body>

</html>