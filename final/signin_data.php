<?php
//Start the session
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
if(isset($_SESSION['msg']))
{
?>

	 <script>
	 alert("You are alreay logged in");
	 </script>
<?php	
}

if(isset($_SESSION['uname']) && isset($_SESSION['pass'] )){
	$uname= $_SESSION['uname'];
	$password = $_SESSION['pass'];
	//$_SESSION['uname']=$uname;
	//$_SESSION['pass']=$password;
	
}

$stuid_temp;


$result = $conn->query("SELECT email,pass,stuid FROM login_info WHERE email='$uname' AND pass='$password'");

if(mysqli_num_rows($result)==1){
	while($row = $result->fetch_assoc())
	{
		 
		$stuid_temp=$row["stuid"];
		echo "STUDENT ID ".$stuid_temp."<br>"."<br>";
		
	}
	$_SESSION["id"] = $stuid_temp;
 	echo '<a href="profile.php">Profile</a>';
	 echo "<br>"."<br>"."Want to apply for course ?";
	 echo '<a href="c_apply.php">Apply Here</a>';
	 echo "<br>".'<a href="logout.php">Logout</a>';
}
   
    

$conn->close();
?>
</body>
</html>
