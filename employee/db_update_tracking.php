<?php
include('../include/dbconn.php');
session_start();

$track_id = $_POST['track'];

$i = 0;
//  if (isset($_POST['submit']))

foreach ($_POST as $sForm => $value) {
    $postedValue = htmlspecialchars(stripslashes($value), ENT_QUOTES);
    $valuearr[$i] = $postedValue;
    $i++;
}


$update = "UPDATE tracking SET
				date='$valuearr[2]',
				curLocation='$valuearr[3]',
                packageID='$valuearr[4]',
				custID='$valuearr[1]',
                branchID='$valuearr[5]'
				WHERE trackingID='$valuearr[0]'";
//echo $update;
$result = mysqli_query($dbconn, $update) or die("Error: " . mysqli_error($dbconn));
$sql = "SELECT * FROM tracking WHERE trackingID= '$track_id' ";
$query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));
$r = mysqli_fetch_assoc($query);

if ($result) {


?>
    <script type="text/javascript">
        window.location = "view_tracking.php"
    </script>
<?php } ?>