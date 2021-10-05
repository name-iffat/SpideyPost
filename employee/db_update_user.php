<?php
include('../include/dbconn.php');
session_start();
/*if (isset($_POST['submit'])) {
    include('../include/dbconn.php');
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    //$level = $_POST['level'];

    //Update data
    $sql = "UPDATE customer SET
    custName='$name',
    gender='$gender',
    custEmail='$email',
    custContact='$phone',
    custddress='$address',
    password='$password'
    WHERE username='$username'";

    $sendsql = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));
    if ($sendsql) {
        //check if connection effected earlier row
        if (mysqli_affected_rows($dbconn) == 0)
            echo "<b>Update is not successful!</b><br>";
        else
            echo "<b>Update is successful!</b><br>";
    } else
        echo "Query failed!";

    /*select data to display
    $sql = "SELECT * FROM customer";
    $sendsql=mysqli_query($dbconn,$sql);
    if($sendsql)
    {
        //use loop to get data each row
        foreach($sendsql as $row)
        echo 
    }*/
$username = $_POST['username'];

$i = 0;
//  if (isset($_POST['submit']))

foreach ($_POST as $sForm => $value) {
    $postedValue = htmlspecialchars(stripslashes($value), ENT_QUOTES);
    $valuearr[$i] = $postedValue;
    $i++;
}


$update = "UPDATE customer SET
				custName='$valuearr[0]',
				gender='$valuearr[1]',
				custEmail='$valuearr[2]',
				custContact='$valuearr[3]',
				custAddress='$valuearr[4]',
				password='$valuearr[6]'
				WHERE username='$valuearr[5]'";
//echo $update;
$result = mysqli_query($dbconn, $update) or die("Error: " . mysqli_error($dbconn));

if ($result) {

?>
    <script type="text/javascript">
        window.location = "view_user.php"
    </script>
<?php } ?>