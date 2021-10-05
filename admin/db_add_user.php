<?php
include('../include/dbconn.php');
if (isset($_POST['submit'])) {
    /* capture values from HTML form */
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $level = $_POST['level'];

    $sql0 = "SELECT username FROM user WHERE username =  '$username'";
    $query0 = mysqli_query($dbconn, $sql0) or die("Error: " . mysqli_error($dbconn));
    $row0 = mysqli_num_rows($query0);

    if ($row0 != 0) {
        header('Location: ../signup/indexrecordexist.html');
        echo "<b>Record is existed</b>";
    } else {
        /* execute SQL INSERT command */
        $sql2 = "INSERT INTO user (username, password,name,gender,address,telephone,email,level_id)
        VALUES ('" . $username . "', '" . $password . "', '" . $name . "', '" . $gender . "', '" . $address . "', '" . $phone . "', '" . $email . "','" . $level . "')";
        mysqli_query($dbconn, $sql2) or die("Error: " . mysqli_error($dbconn));
        /* rediredt to respective page */
        header('Location: ../index.html');
        echo "Data has been saved";
    }
}
/*tutupdb*/
mysqli_close($dbconn);
