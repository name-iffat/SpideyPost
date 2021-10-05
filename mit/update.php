<?php
include("dbconn.php");
$track = @$_POST['trackingID']; //the @ is optional, to suppress error messages
$date = @$_POST['date'];
$curLocation = @$_POST['curLocation'];
$packageID = @$_POST['packageID'];
$custID = @$_POST['custID'];
$branchID = @$_POST['branchID'];

$sql = "UPDATE tracking SET date='$date',curLocation='$curLocation',packageID='$packageID',custID='$custID',branchID='$branchID' WHERE trackingID='$track'";
$res = mysqli_query($dbconn, $sql) or die(mysqli_error($dbconn));
if ($res === true) echo "OK_EDIT";
mysqli_close($dbconn);
