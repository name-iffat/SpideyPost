<?PHP
$con = mysqli_connect("localhost","root","","spideydb");
$sql = 'select * from tracking';
$result = mysqli_query($con,$sql) or die(mysqli_error()."<hr/>Line:".__LINE__."<br/>");
while($rs = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	$json[] = $rs;
}//end while

//header('Content-Type: application/json');
echo json_encode($json);

mysqli_free_result($result);
mysqli_close($con);

?>