<?php
include('../include/dbconn.php');

$trackid = $_GET['trackingID'];

$delete = "DELETE FROM tracking WHERE trackingID='$trackid'";
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