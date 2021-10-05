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
    <title>Spidey Post | Staff Login</title>
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
        


        <div class="main">
            
            <div class="container1">
                <br><br>
                <h3>Search User Data</h3>

                <fieldset>

                    <h1>Enter User Name </h1>

                    <form name="form1" method="post" action="db_search_user.php" enctype="multipart/form-data">
                        <table class="tableContent" width="80%" border="0" align="center">
                            <tr>
                                <td width="16%">User Name</td>
                                <td width="84%"><input type="text" name="search_name" size="50" />
                            </tr>
                            <tr>
                                <td align="right" colspan="2"><input type="submit" name="submit" value=" Search " />
                                    <input type="button" name="cancel" value=" Cancel " onclick="location.href='view_user.php'" />
                                </td>
                            </tr>
                        </table>
                    </form>

                </fieldset>

            </div>
        </div>
    </div>
</body>

</html>