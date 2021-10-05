<?php
// Inialize session
session_start();

// Include database connection settings
include('../include/dbconn.php');

if (isset($_POST['login'])) {

    /* capture values from HTML form */
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM employee WHERE username= '$username' AND password= '$password'";
    $query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));
    $row = mysqli_num_rows($query);
    if ($row == 0) {
        // Jump to indexwrong page
        header('Location: indexwrong.html');
    } else {
        $r = mysqli_fetch_assoc($query);
        $_SESSION['username'] = $r['name'];
        $level = $r['level'];
        if ($level == 1) {
            $_SESSION['username'] = $r['employeeName'];
            header("Location: ../admin/view_user.php");
        } elseif ($level == 2) {
            $_SESSION['username'] = $r['employeeName'];
            // Jump to secured page
            header('Location: ../employee/view_user.php');
        } else {
            header('Location: index.html');
            //echo($level);
        }
    }
}
mysqli_close($dbconn);
