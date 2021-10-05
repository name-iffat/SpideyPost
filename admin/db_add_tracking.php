<?php
include('../include/dbconn.php');


if (isset($_POST['submit'])) {
    /* capture values from HTML form */
    $custID = $_POST['tname'];
    $trackid = $_POST['track'];
    //$custID = $_POST['custID'];
    $dateo = $_POST['dateo'];
    $curLocation = $_POST['curLocation'];
    $package_id = $_POST['packageID'];
    $branchID = $_POST['branchID'];

    $sql0 = "SELECT trackingID FROM tracking WHERE trackingID =  '$trackid'";
    $query0 = mysqli_query($dbconn, $sql0) or die("Error: " . mysqli_error($dbconn));
    $row0 = mysqli_num_rows($query0);

    date_default_timezone_set("Asia/Kuala_Lumpur");
    $date = date("Y-m-d");
    $time = date("H:i:s");
    if ($row0 != 0) {
        header('Location: ../admin/add_tracking_existed.php');
        echo "<b>Record is existed</b>";
    } else {
        /* execute SQL INSERT command */
        $sql2 = "INSERT INTO tracking (trackingID,date, curLocation,packageID, custID,branchID)
        VALUES ('" . $trackid . "', '" . $date . "', '" . $curLocation . "','" . $package_id . "','" . $custID . " ',' " . $branchID . "')";
        mysqli_query($dbconn, $sql2) or die("Error: " . mysqli_error($dbconn));
        /* rediredt to respective page */
        header('Location: ../admin/view_tracking.php');
        echo "Data has been saved";
    }
}
/*tutupdb*/
mysqli_close($dbconn);
