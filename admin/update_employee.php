<!DOCTYPE html>
<?php
include('../include/dbconn.php');

session_start();

if (!isset($_SESSION['username'])) {
    header('Location: ../login');
}
$user_id = $_GET['employeeID'];

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
            <h2><div>Spidey</div> Post</h2>
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

        <div class="main">

            <h3>Update Employee Data</h3>
            <?php
            $username = $_SESSION['username'];
            $query = "SELECT * FROM employee where employeeID = '$user_id' ";
            $result = mysqli_query($dbconn, $query) or die("Error: " . mysqli_error($dbconn));
            $row = mysqli_fetch_array($result);
            ?>

            <form name="edit_user" method="post" action="db_update_emp.php" enctype="multipart/form-data">
                <table class="tableContent" width="80%" border="0" align="center">
                    <tr>
                        <td width="16%">Name</td>
                        <td width="84%"><input type="text" name="name" size="50" value="<?php echo ucwords(strtolower($row['employeeName'])); ?>" /></td>
                    </tr>
                    <tr>
                        <td width="16%">Gender</td>
                        <td>
                            <input name="gender" type="radio" value="1" <?php if ($row['gender'] == 1) {
                                                                            echo 'checked';
                                                                        } ?> />Men
                            <input name="gender" type="radio" value="2" <?php if ($row['gender'] == 2) {
                                                                            echo 'checked';
                                                                        } ?> />Women
                        </td>
                    </tr>
                    <tr>
                        <td width="16%">Email</td>
                        <td><input type="text" name="email" size="50" value="<?php echo $row['employeeEmail']; ?>" /></td>
                    </tr>
                    <tr>
                        <td width="16%">Phone No</td>
                        <td><input type="text" name="phone" size="50" value="<?php echo $row['employeeContact']; ?>" /></td>
                    </tr>
                    <tr>
                        <td width="16%">Address</td>
                        <td><textarea name="address" cols="47" rows="3"><?php echo ucwords(strtolower($row['employeeAddress'])); ?></textarea></td>
                    </tr>
                    <tr>
                        <td width="16%">Username</td>
                        <td><?php echo $row['username']; ?>
                            <input type="hidden" name="username" size="50" value="<?php echo $row['username']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td width="16%">Password</td>
                        <td><input type="password" name="password" size="50" value="<?php echo $row['password']; ?>" /></td>
                    </tr>
                    <td align="right" colspan="2"><input type="submit" name="submit" value=" Save " />
                        <input type="button" name="cancel" value=" Cancel " onclick="location.href='view_user.php'" />
                    </td>
                    </tr>

                </table>
            </form>

            </fieldset>

        </div>
    </div>
</body>

</html>