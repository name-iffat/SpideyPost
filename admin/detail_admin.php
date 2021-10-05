<!DOCTYPE html>
<?php
include('../include/dbconn.php');

session_start();
$user = $_SESSION['username'];

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
    <title>Spidey Post | Admin Dashboard</title>
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
        <div class="main">
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

            </div>
        </div>
        <div class="container">

            <h3>User Detail </h3>

            <?php
            $query = "SELECT * FROM employee WHERE level=1";
            $result = mysqli_query($dbconn, $query) or die("Error: " . mysqli_error($dbconn));
            $row = mysqli_fetch_array($result);
            ?>

            <fieldset>

                <form name="edit_user" method="post" action="db_update_user.php" enctype="multipart/form-data">
                    <table class="tableContent" width="80%" border="0" align="center">
                        <tr>
                            <td width="16%">Name</td>
                            <td width="84%"><?php echo ucwords(strtolower($row['employeeName'])); ?></td>
                        </tr>
                        <tr>
                            <td width="16%">Gender</td>
                            <td>
                                <?php if ($row['gender'] == 1) {
                                    echo 'MEN';
                                } ?>
                                <?php if ($row['gender'] == 2) {
                                    echo 'WOMEN';
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="16%">Email</td>
                            <td><?php echo $row['employeeEmail']; ?></td>
                        </tr>
                        <tr>
                            <td width="16%">Phone No</td>
                            <td><?php echo $row['employeeContact']; ?></td>
                        </tr>
                        <tr>
                            <td width="16%">Address</td>
                            <td><?php echo ucwords(strtolower($row['employeeAddress'])); ?></td>
                        </tr>
                        <tr>
                            <td width="16%">Username</td>
                            <td><?php echo $row['username']; ?>
                                <input type="hidden" name="username" size="50" value="<?php echo $row['username']; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td width="16%">Password</td>
                            <td><?php echo $row['password']; ?></td>
                        </tr>
                        <tr>
                            <td align="right" colspan="2"><input type="button" name="cancel" value="Back " onclick="location.href='view_user.php'" /></td>
                        </tr>

                    </table>
                </form>

            </fieldset>

        </div>
    </div>
</body>

</html>