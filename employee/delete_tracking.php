<?php
include('../include/dbconn.php');

$id = $_GET['trackingID'];

$delete = "DELETE FROM tracking WHERE trackingID='$id'";
$result = mysqli_query($dbconn, $delete) or die("Error: " . mysqli_error($dbconn));
//echo $delete;

if ($result) {
?>
    <script type="text/javascript">
        window.location = "view_tracking.php"
    </script>
<?php } else {
    echo $update;
?>
    <script type="text/javascript">
        window.location = "view_tracking.php"
    </script>
<?php
}

?>