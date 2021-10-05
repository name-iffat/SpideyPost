<?php
include("dbconn.php");
$track = @$_POST['trackingID']; //the @ is optional, to suppress error messages
$date = @$_POST['date'];
$curLocation = @$_POST['curLocation'];
$packageID = @$_POST['packageID'];
$custID = @$_POST['custID'];
$branchID = @$_POST['branchID'];

$sql = "INSERT INTO tracking (trackingID,date,curLocation,packageID,custID,branchID) VALUES ('$track','$date','$curLocation','$packageID','$custID','$branchID')";
$res = mysqli_query($dbconn, $sql) or die(mysqli_error($dbconn));
if ($res == 1) echo "OK";
mysqli_close($dbconn);
