<html>
<body bgcolor="#EEFDEF">

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "login";

	$uname= $_POST['uname'];
	$dob= $_POST['dob'];

$password_is;
$conn = new mysqli($servername, $username, $password, $dbname);

$result = $conn->query("SELECT pass FROM login_info WHERE email='$uname' AND dob='$dob'");

if(mysqli_num_rows($result)==1){
	while($row = $result->fetch_assoc())
	{
		 
		$password_is=$row["pass"];
		echo "Password is ".$password_is."<br>"."<br>";
		
	}
 	echo '<a href="signin.php">Sign in</a>';
	
	}
else{
		echo "No data found"."<br>";
		 	echo '<a href="signup.php">Want to Sign up</a>';
	}
   
    

$conn->close();
?>
</body>
</html>
