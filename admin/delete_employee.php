<?php
include('../include/dbconn.php');

$id = $_GET['employeeID'];

$delete = "DELETE FROM employee WHERE employeeID='$id'";
$result = mysqli_query($dbconn, $delete) or die("Error: " . mysqli_error($dbconn));
//echo $delete;

if ($result) {
?>
    <script type="text/javascript">
        window.location = "view_user.php"
    </script>
<?php } else {
    echo $update;
?>
    <script type="text/javascript">
        window.location = "view_user.php"
    </script>
<?php
}

?>