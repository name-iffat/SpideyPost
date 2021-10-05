<?php
include('../include/dbconn.php');

$id = $_GET['custID'];

$delete = "DELETE FROM customer WHERE custID='$id'";
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