<!DOCTYPE html>
<?php
include('../include/dbconn.php');

session_start();

if (!isset($_SESSION['username'])) {
  header('Location: ../login');
}
$track_id = $_GET['trackingID'];

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
      <h1> Tracking Dashboard</h1>
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
      <h3>Update Tracking Data</h3>

      <?php
      $username = $_SESSION['username'];
      $query = "SELECT * FROM tracking where trackingID = '$track_id' ";
      $result = mysqli_query($dbconn, $query) or die("Error: " . mysqli_error($dbconn));
      $row = mysqli_fetch_array($result);
      ?>

      <form name="edit_data" method="post" action="db_update_tracking.php" enctype="multipart/form-data">
        <table class="tableContent" width="80%" border="0" align="center">
          <tr>
            <td width="16%">Tracking id</td>
            <td width="">
              <input type="text" name="track" size="50" value="<?php echo $row['trackingID']; ?>" />
            </td>
          </tr>

          <tr>
            <td width="16%">Customer ID</td>
            <td width="">
              <input type="text" name="tname" size="50" value="<?php echo $row['custID']; ?>" />
            </td>
          </tr>
          <tr>
            <td width="16%">Date</td>
            <td><input type="date" name="dateo" size="50" value="<?php echo $row['date']; ?>" /></td>
          </tr>
          <td width="16%">Current Location</td>
          <td><input type="text" name="curLocation" cols="52" rows="3" value="<?php echo $row['curLocation']; ?>" /></td>
          </tr>
          <?php
          /* $sql = "SELECT * FROM tracking";
                        $query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));
                        while ($r = mysqli_fetch_assoc($query)) {
                            $package_id = $r['packageID'];
                        }*/
          $strPid = "pid";

          ?>
          <tr>
            <td width="16%">Package ID</td>
            <td><input type="text" name="packageID" size="50" value="<?php echo $row['packageID']; ?>" /></td>
          </tr>

          <td width="16%">Branch Name</td>
          <td><input type="text" name="branchID" size="50" value="<?php echo $row['branchID']; ?>" /></td>
          </tr>

          <tr>
            <td align="right" colspan="2"><input type="submit" name="submit" value=" Save " />
              <input type="button" name="cancel" value=" Cancel " onclick="location.href='view_tracking.php'" />
            </td>
          </tr>

        </table>
      </form>

      </fieldset>

    </div>
  </div>
</body>

</html>