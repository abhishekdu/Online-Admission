<?php
session_start();
?>
<html>
<body>
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$stuid = $_SESSION['id'];
$temp;

$result = $conn->query("SELECT adm_in FROM stu_info WHERE stuid='$stuid'");

                                        
                    if(mysqli_num_rows($result)>0){
	
                        while($row = $result->fetch_assoc())
	                    {
		                    $temp=$row["adm_in"];
                        }
                        }
                         else {
                            echo "Error: table stuinfo" . $sql . "<br>" . $conn->error;
                        }

                        if($temp=='MSc'||$temp=='MCA')
                        {
                            echo "Already admitted";
                        }
                        else
                        {
                            $sql1 = "UPDATE stu_info
                            SET adm_in = 'MCA'
                            WHERE stuid = '$stuid' ";

                            if ($conn->query($sql1) === TRUE) {
                                echo "Congratulation you are admitted ";
                            } else {
                                echo "Error: table stuinfo" . $sql . "<br>" . $conn->error;
                            }   


                        }

            


$conn->close();
?>
<a href="index.php">Home</a>
</body>
</html>