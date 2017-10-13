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

$stuid_temp = $_SESSION['id'];
//$stuid_temp="17CSCl249";

	  $try="SELECT * FROM stu_info where stuid='$stuid_temp'";
    $try2="SELECT * FROM edu_inter_info where stuid='$stuid_temp'";
	  $try3="SELECT * FROM edu_ug_info where stuid='$stuid_temp'";
	  $try4="SELECT * FROM mca_adm where stuid='$stuid_temp'";
    $try5="SELECT * FROM msc_adm where stuid='$stuid_temp'";
    $try6="SELECT * FROM msc_adm_temp where stuid='$stuid_temp'";
    $try7="SELECT * FROM mca_adm_temp where stuid='$stuid_temp'";

    $result=mysqli_query($conn, $try); 
    $result2=mysqli_query($conn, $try2);
	  $result3=mysqli_query($conn, $try3); 
    $result4=mysqli_query($conn, $try4); 
    $result5=mysqli_query($conn, $try5); 
    $result6=mysqli_query($conn, $try6);
    $result7=mysqli_query($conn, $try7);

echo "<table border='1'>
<tr>
<th>Name</th>
<th>Gender</th>
<th>DOB</th>
<th>Father name</th>
<th>mobile</th>
<th>Local Address</th>
<th>permanent Address</th>
<th>Student ID</th>
</tr>";
 
while($row = mysqli_fetch_assoc($result))
  {
  echo "<tr>";
  echo "<td>" . $row['fname']." ". $row['lname']. "</td>";
  echo "<td>" . $row['gender'] . "</td>";
  echo "<td>" . $row['dob'] . "</td>";
  echo "<td>" . $row['fname'] . "</td>";
  echo "<td>" . $row['mobile']."</td>";
  echo "<td>" . $row['ladds']."</td>";
  echo "<td>" . $row['padds']."</td>";
  echo "<td>" . $row['stuid']."</td>";
  echo "</tr>";
  }
echo "</table>"."<br>"."<br>";
 

echo "Education Qualification";
echo "<table border='1'>
<tr>
<th>Exam Passed</th>
<th>Stream</th>
<th>Board</th>
<th>Year</th>
<th>Max. Marks</th>
<th>Marks Obtained</th>
<th>Percentage</th>
</tr>";
 
while($row = mysqli_fetch_assoc($result2))
  {
  echo "<tr>";
  echo "<td>" . $row['intermediate']. "</td>";
  echo "<td>" . $row['stream'] . "</td>";
  echo "<td>" . $row['board'] . "</td>";
  echo "<td>" . $row['year'] . "</td>";
  echo "<td>" . $row['m_marks']."</td>";
  echo "<td>" . $row['marks_obt']."</td>";
  echo "<td>" . $row['per']."</td>";
  echo "</tr>";
  }

 
while($row = mysqli_fetch_assoc($result3))
  {
  echo "<tr>";
  echo "<td>" . $row['under_grad']. "</td>";
  echo "<td>" . $row['ug_subject'] . "</td>";
  echo "<td>" . $row['ug_board'] . "</td>";
  echo "<td>" . $row['ug_year'] . "</td>";
  echo "<td>" . $row['ug_m_marks']."</td>";
  echo "<td>" . $row['ug_marks_obt']."</td>";
  echo "<td>" . $row['ug_per']."</td>";
  echo "</tr>";
  }
echo "</table>"."<br>"."<br>";

echo "COURSE APPLIED ";
 if(mysqli_num_rows($result4)==0 && mysqli_num_rows($result5)==0)
 {
   echo "<br>"." Not applied in any course till now";
 }
 else
 {


echo "<table border='1'>
<tr>
<th>Course Applied</th>
<th>Admission Criteria</th>
<th>Center choice1</th>
<th>Center Choice2</th>
</tr>";
 
while($row = mysqli_fetch_assoc($result4))
  {
  echo "<tr>";
  echo "<td>" . "MCA". "</td>";
  echo "<td>" . $row['adm_criteria'] . "</td>";
  echo "<td>" . $row['c_choice1'] . "</td>";
  echo "<td>" . $row['c_choice2'] . "</td>";
  echo "</tr>";
  }

while($row = mysqli_fetch_assoc($result5))
  {
  echo "<tr>";
  echo "<td>" . "MSc". "</td>";
  echo "<td>" . $row['adm_criteria'] . "</td>";
  echo "<td>" . $row['c_choice1'] . "</td>";
  echo "<td>" . $row['c_choice2'] . "</td>";
  echo "</tr>";
  }
  echo "</table>"."<br>"."<br>";

  
echo "SELECTED IN ";
 
 if(mysqli_num_rows($result6)==0 && mysqli_num_rows($result7)==0)
 {
   echo "<br>"." Not Selected in any course";
 }
 else
 {

if(mysqli_num_rows($result6)>0)
{
  echo "<br>"."Congratulation you are selected in M.Sc.";
}

if(mysqli_num_rows($result7)>0)
{
  echo "<br>"."Congratulation you are selected in MCA.";
}
 }
 }
 if (!$mysqli->query($try)) {
    printf("Errormessage: %s\n", $mysqli->error);
}
    


   
    
$conn->close();
?>
</body>
</html>
