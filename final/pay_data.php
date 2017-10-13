<html>
<body bgcolor="#EEFDEF">
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);

$uname = $_REQUEST['username'];
$password=$_REQUEST['password'];

$stuid_temp;


$result = $conn->query("SELECT email,pass,stuid FROM login_info WHERE email='$uname' AND pass='$password'");

if(mysqli_num_rows($result)==1){
	while($row = $result->fetch_assoc())
	{
		 
		$stuid_temp=$row["stuid"];
		echo "STUDENT ID ".$stuid_temp."<br>"."<br>";
		
	}
        $try1="SELECT * FROM msc_adm_temp where stuid='$stuid_temp'";
        $try2="SELECT * FROM mca_adm_temp where stuid='$stuid_temp'";
        
        $result1=mysqli_query($conn, $try1);
        $result2=mysqli_query($conn, $try2);

         if(mysqli_num_rows($result1)==0 && mysqli_num_rows($result2)==0)
         {
                echo "<br>"." Not Selected in any course";
            }
        else
        {          

            if(mysqli_num_rows($result1)>0)
            {
                echo "<br>"."Congratulation you are selected in M.Sc.";
                echo '<a href="adm_apply_msc.php" >Apply Here</a>';
            }

            if(mysqli_num_rows($result2)>0)
            {
                echo "<br>"."Congratulation you are selected in MCA.";
                echo '<a href="adm_apply_mca.php" >Apply Here</a>';
            }
        }

}
else 
{

	echo "Wrong email id or password";
	echo "<br>".'<a href="signup.php">SIGN UP</a>';
    echo "<br>".'<a href="pay.php">Try again</a>';
}
   
    

$conn->close();
?>
</body>
</html>
