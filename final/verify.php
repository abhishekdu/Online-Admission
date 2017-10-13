<?php
session_start();
?>

<html>
<body bgcolor="#EEFDEF">
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "login";

    
$conn = new mysqli($servername, $username, $password, $dbname);


$uname = $_POST['username'];
	$password=$_POST['password'];


$result = $conn->query("SELECT email,pass,stuid FROM login_info WHERE email='$uname' AND pass='$password'");


if(mysqli_num_rows($result)==1){
	while($row = $result->fetch_assoc())
	{
		 

	$temp= $row["stuid"];
    $_SESSION["id"]=$temp; 
		$_SESSION['uname']=$uname;
	$_SESSION['pass']=$password;
	header("location: signin_data.php");
	
	}

}
else 
{

//$error = "Username or password does not match";
echo "Username or password does not match";
header("location: signin_wrong.php");

}
   
   

$conn->close();
?>
</body>
</html>
