<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SpideyPost | Admin Dashboard</title>
</head>
<?php
session_start();

if (!isset($_SESSION['username'])) {
  header('Location: ../login');
}

?>

<body>
  <b> Admin Dashboard</b>
  <a href="../login/logout.php">Logout</a>
  <br>

  <b>Employee</b>
  <a href="../admin/add_emp.html">Add</a>
  <br>
  <b>User</b>
  <a href="view_user.php">View</a>
  <a href="update_view_user.php">Update</a>
  <a href="search_user.php">Search</a>
  <br>
  <b>Tracking</b>
  <a href="view_tracking.php">View</a>
  <a href="add_tracking.php">Add</a>
  <a href="update_view_tracking.php">Update</a>


  <div class="main">
    <div class="main">
      <div class="greatuser">
        <h1>Welcome <?php echo $_SESSION['username']; ?></h1>
        <h3>Spidey Post Administrator Dashboard</h3>
      </div>
    </div>
</body>

</html>