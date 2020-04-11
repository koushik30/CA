<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentinfo";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST["submit"]))
{
	$rolno = $_POST["rolno"];
	$maths = $_POST["math"];
	$physics = $_POST["phy"];
	$chemistry = $_POST["chem"];
	$percentage = (($maths+$physics+$chemistry)/300)*100;
	$sql = "insert into student (rolnumber,maths,physics,chemistry,percentage) values ($rolno,$maths,$physics,$chemistry,$percentage) ";
	$result = mysqli_query($conn, $sql);
	if ($result) 
	{
		echo "The percentage of rollnumber ",$rolno," is:",$percentage,"%";
	} 
	else 
	{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);	
	}
}
else
{
	echo "error";
}
?>