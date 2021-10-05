<?php
include("dbconn.php");
$track=@$_POST['trackingID']; //the @ is optional, to suppress error messages
$sql="DELETE FROM tracking where trackingID=$track";
$res=mysqli_query($dbconn,$sql) or die(mysqli_error($dbconn));

$check = mysqli_num_rows($res);

if($check > 0)
{
$input = mysqli_query($dbconn, "DELETE FROM admin WHERE adminid=$adminid");
echo "Data has been deleted";
}
else
{
echo "Data has not found";
}

//if ($res==1) echo "OK_DEL";
mysqli_close($dbconn);
