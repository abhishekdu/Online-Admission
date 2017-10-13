<html>
<head>

</head>
<body bgcolor="#EEFDEF">
<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "login";

$unreserved_student = "2";
$OBC_student = "2";
$SC_student = "2";
$ST_student = "2"; 


$unreserved_student_merit = "2";
$OBC_student_merit = "2";
$SC_student_merit = "2";
$ST_student_merit = "2"; 

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


echo "MSc RESULT";
$try = "SELECT count(*) from edu_info where adm_in='MSc' and category='Unreserved'";
$result=mysqli_query($conn, $try);

while($row = mysqli_fetch_assoc($result))
  {
   $unreserved_student=$unreserved_student- $row['count(*)'];
  }
  
$tryobc = "SELECT count(*) from edu_info where adm_in='MSc' and category='OBC'";
$resultobc=mysqli_query($conn, $tryobc);

while($rowobc = mysqli_fetch_assoc($resultobc))
  {
   $OBC_student=$OBC_student- $rowobc['count(*)'];
  }

$trysc = "SELECT count(*) from edu_info where adm_in='MSc' and category='SC'";
$resultsc=mysqli_query($conn, $trysc);

while($rowsc = mysqli_fetch_assoc($resultsc))
  {
   $SC_student=$SC_student- $rowsc['count(*)'];
  }

$tryst = "SELECT count(*) from edu_info where adm_in='MSc' and category='ST'";
$resultst=mysqli_query($conn, $tryst);

while($rowst = mysqli_fetch_assoc($resultst))
  {
   $ST_student=$ST_student- $rowst['count(*)'];
  }


//UNRESERVED CATEGORY(Entrance based)
    $try1="SELECT * FROM msc_adm natural join edu_ug_info NATURAL JOIN stu_info 
            where  (adm_criteria=1 or adm_criteria=3)
             and stuid not in (SELECT stuid  FROM msc_adm_temp)
             order by ug_entrance_msc desc limit $unreserved_student";


//OBC(Entrance based)
    
            $try2= "SELECT * FROM msc_adm natural join edu_ug_info NATURAL JOIN stu_info 
            where category='OBC' and (adm_criteria=1 or adm_criteria=3)
             and stuid NOT in 
             (SELECT * FROM ( select stuid from msc_adm natural join edu_ug_info NATURAL JOIN stu_info 
            where  (adm_criteria=1 or adm_criteria=3)
             order by ug_entrance_msc desc limit $unreserved_student) as t)
            and stuid not in (SELECT stuid  FROM msc_adm_temp)
            order by ug_entrance_msc desc limit $OBC_student";


//SC(Entrance based)

                $try3= "SELECT * FROM msc_adm natural join edu_ug_info NATURAL JOIN stu_info 
            where category='SC' and (adm_criteria=1 or adm_criteria=3)
             and stuid not in 
             (SELECT * FROM ( select stuid from msc_adm natural join edu_ug_info NATURAL JOIN stu_info 
            where  (adm_criteria=1 or adm_criteria=3)
             order by ug_entrance_msc desc limit $unreserved_student) as t) 
                          and stuid not in (SELECT stuid  FROM msc_adm_temp)
                          order by ug_entrance_msc desc limit $SC_student";


//ST(Entrance based)

                $try4= "SELECT * FROM msc_adm natural join edu_ug_info NATURAL JOIN stu_info  
            where category='ST' and (adm_criteria=1 or adm_criteria=3)
             and stuid not in 
             (SELECT * FROM ( select stuid from msc_adm natural join edu_ug_info NATURAL JOIN stu_info 
            where  (adm_criteria=1 or adm_criteria=3)
             order by ug_entrance_msc desc limit $unreserved_student) as t)
                          and stuid not in (SELECT stuid  FROM msc_adm_temp)
                           order by ug_entrance_msc desc limit $ST_student";

        

//UNRESERVED CATEGORY(Merit based)
    $try5="SELECT * FROM msc_adm natural join edu_ug_info NATURAL JOIN stu_info 
            where  (adm_criteria=2 or adm_criteria=3)
             and stuid NOT in 
                    (SELECT stuid  FROM msc_adm_temp  
                        
                    ) and order by ug_per desc limit $unreserved_student";

//OBC(Merit based)
    
            $try6= "SELECT * FROM msc_adm natural join edu_ug_info NATURAL JOIN stu_info 
            where category='OBC' and (adm_criteria=2 or adm_criteria=3)
             and stuid NOT in 
             (SELECT * FROM ( select stuid from msc_adm natural join edu_ug_info NATURAL JOIN stu_info 
            where  (adm_criteria=2 or adm_criteria=3)
             order by ug_per desc limit $unreserved_student) as t) 
             and stuid not in (SELECT stuid  FROM msc_adm_temp)
             order by ug_per desc limit $OBC_student";


//SC(Merit based)

                $try7= "SELECT * FROM msc_adm natural join edu_ug_info NATURAL JOIN stu_info 
            where category='SC' and (adm_criteria=2 or adm_criteria=3)
             and stuid not in 
             (SELECT * FROM ( select stuid from msc_adm natural join edu_ug_info NATURAL JOIN stu_info 
            where  (adm_criteria=2 or adm_criteria=3)
             order by ug_per desc limit $unreserved_student) as t)
              and stuid not in (SELECT stuid  FROM msc_adm_temp)
              order by ug_per desc limit $SC_student";


//ST(Merit based)

                $try8= "SELECT * FROM msc_adm natural join edu_ug_info NATURAL JOIN stu_info  
            where category='ST' and (adm_criteria=2 or adm_criteria=3)
             and stuid not in 
             (SELECT * FROM ( select stuid from msc_adm natural join edu_ug_info NATURAL JOIN stu_info 
            where  (adm_criteria=2 or adm_criteria=3)
             order by ug_per desc limit $unreserved_student) as t)
              and stuid not in (SELECT stuid  FROM msc_adm_temp)
              order by ug_per desc limit $ST_student";


    $result1=mysqli_query($conn, $try1); 
    $result2=mysqli_query($conn, $try2);
    $result3=mysqli_query($conn, $try3);
    $result4=mysqli_query($conn, $try4);
    
    $result5=mysqli_query($conn, $try5); 
    $result6=mysqli_query($conn, $try6);
    $result7=mysqli_query($conn, $try7);
    $result8=mysqli_query($conn, $try8);

echo "<br>"."<br>"."UNRESERVED CATEGORY(Entrance based)";
echo "<table border='1'>
<tr>
<th>Name</th>
<th>DOB</th>
<th>Category</th>
<th>Entance Marks</th>
<th>Student ID</th>
</tr>";
 
while($row = mysqli_fetch_assoc($result1))
  {
  echo "<tr>";
  echo "<td>" . $row['fname']." ". $row['lname']. "</td>";
  echo "<td>" . $row['dob'] . "</td>";
  echo "<td>" . $row['category'] . "</td>";
  echo "<td>" . $row['ug_entrance_msc'] . "</td>";
  echo "<td>" . $row['stuid']."</td>";
  echo "</tr>";
  $temp1=$row['fname'];
  $temp2=$row['stuid'];
  
                $sql2="select * from msc_adm_temp where stuid='$temp2'";
                      $result_sql2=mysqli_query($conn, $sql2); 
                     
                if(mysqli_num_rows($result_sql2) <= 0){  
                    
                    $sql = "INSERT INTO msc_adm_temp(fname,stuid)
                        VALUES ('$temp1','$temp2')";

                                if ($conn->query($sql) === TRUE) {
                                    //echo "New record created successfully ";
                                } else {
                                     echo "Error: table msc_adm_temp 1" . $sql . "<br>" . $conn->error;
                                }

                    }
                
  }

echo "</table>";
 

echo "<br>"."<br>"."OBC(Entrance based)";
echo "<table border='1'>
<tr>
<th>Name</th>
<th>DOB</th>
<th>Category</th>
<th>Entance Marks</th>
<th>Student ID</th>
</tr>";
 
while($row = mysqli_fetch_assoc($result2))
  {
  echo "<tr>";
  echo "<td>" . $row['fname']." ". $row['lname']. "</td>";
  echo "<td>" . $row['dob'] . "</td>";
  echo "<td>" . $row['category'] . "</td>";
  echo "<td>" . $row['ug_entrance_msc'] . "</td>";
  echo "<td>" . $row['stuid']."</td>";
  echo "</tr>";
  $temp1=$row['fname'];
  $temp2=$row['stuid'];
  
                $sql2="select * from msc_adm_temp where stuid='$temp2'";
                      $result_sql2=mysqli_query($conn, $sql2); 
                     
                if(mysqli_num_rows($result_sql2) <= 0){  
                    
                    $sql = "INSERT INTO msc_adm_temp(fname,stuid)
                        VALUES ('$temp1','$temp2')";

                                if ($conn->query($sql) === TRUE) {
                                    //echo "New record created successfully ";
                                } else {
                                     echo "Error: table msc_adm_temp 2" . $sql . "<br>" . $conn->error;
                                }

                    }

  }

echo "</table>";

echo "<br>"."<br>"."SC(Entrance based)";

echo "<table border='1'>
<tr>
<th>Name</th>
<th>DOB</th>
<th>Category</th>
<th>Entance Marks</th>
<th>Student ID</th>
</tr>";
 
while($row = mysqli_fetch_assoc($result3))
  {
  echo "<tr>";
  echo "<td>" . $row['fname']." ". $row['lname']. "</td>";
  echo "<td>" . $row['dob'] . "</td>";
  echo "<td>" . $row['category'] . "</td>";
  echo "<td>" . $row['ug_entrance_msc'] . "</td>";
  echo "<td>" . $row['stuid']."</td>";
  echo "</tr>";
  $temp1=$row['fname'];
  $temp2=$row['stuid'];
  
                $sql2="select * from msc_adm_temp where stuid='$temp2'";
                      $result_sql2=mysqli_query($conn, $sql2); 
                     
                if(mysqli_num_rows($result_sql2) <= 0){  
                    
                    $sql = "INSERT INTO msc_adm_temp(fname,stuid)
                        VALUES ('$temp1','$temp2')";

                                if ($conn->query($sql) === TRUE) {
                                    //echo "New record created successfully ";
                                } else {
                                     echo "Error: table msc_adm_temp 3" . $sql . "<br>" . $conn->error;
                                }

                    }

  }

echo "</table>";

echo "<br>"."<br>"."ST(Entrance based)";

echo "<table border='1'>
<tr>
<th>Name</th>
<th>DOB</th>
<th>Category</th>
<th>Entance Marks</th>
<th>Student ID</th>
</tr>";
 
while($row = mysqli_fetch_assoc($result4))
  {
  echo "<tr>";
  echo "<td>" . $row['fname']." ". $row['lname']. "</td>";
  echo "<td>" . $row['dob'] . "</td>";
  echo "<td>" . $row['category'] . "</td>";
  echo "<td>" . $row['ug_entrance_msc'] . "</td>";
  echo "<td>" . $row['stuid']."</td>";
  echo "</tr>";
$temp1=$row['fname'];
  $temp2=$row['stuid'];
  
                $sql2="select * from msc_adm_temp where stuid='$temp2'";
                      $result_sql2=mysqli_query($conn, $sql2); 
                     
                if(mysqli_num_rows($result_sql2) <= 0){  
                    
                    $sql = "INSERT INTO msc_adm_temp(fname,stuid)
                        VALUES ('$temp1','$temp2')";

                                if ($conn->query($sql) === TRUE) {
                                    //echo "New record created successfully ";
                                } else {
                                     echo "Error: table msc_adm_temp 4" . $sql . "<br>" . $conn->error;
                                }

                    }
  }

echo "</table>";

echo "<br>"."<br>"."UNRESERVED(Merit based)";
echo "<table border='1'>
<tr>
<th>Name</th>
<th>DOB</th>
<th>Category</th>
<th>percentage</th>
<th>Student ID</th>
</tr>";
 
while($row = mysqli_fetch_assoc($result5))
  {
  echo "<tr>";
  echo "<td>" . $row['fname']." ". $row['lname']. "</td>";
  echo "<td>" . $row['dob'] . "</td>";
  echo "<td>" . $row['category'] . "</td>";
  echo "<td>" . $row['ug_per'] . "</td>";
  echo "<td>" . $row['stuid']."</td>";
  echo "</tr>";

   $temp1=$row['fname'];
  $temp2=$row['stuid'];
  
                $sql2="select * from msc_adm_temp where stuid='$temp2'";
                      $result_sql2=mysqli_query($conn, $sql2); 
                     
                if(mysqli_num_rows($result_sql2) <= 0){  
                    
                    $sql = "INSERT INTO msc_adm_temp(fname,stuid)
                        VALUES ('$temp1','$temp2')";

                                if ($conn->query($sql) === TRUE) {
                                    //echo "New record created successfully ";
                                } else {
                                     echo "Error: table msc_adm_temp 5" . $sql . "<br>" . $conn->error;
                                }

                    }
  }

echo "</table>";

echo "<br>"."<br>"."OBC(Merit based)";
echo "<table border='1'>
<tr>
<th>Name</th>
<th>DOB</th>
<th>Category</th>
<th>percentage</th>
<th>Student ID</th>
</tr>";
 
while($row = mysqli_fetch_assoc($result6))
  {
  echo "<tr>";
  echo "<td>" . $row['fname']." ". $row['lname']. "</td>";
  echo "<td>" . $row['dob'] . "</td>";
  echo "<td>" . $row['category'] . "</td>";
  echo "<td>" . $row['ug_per'] . "</td>";
  echo "<td>" . $row['stuid']."</td>";
  echo "</tr>";

   $temp1=$row['fname'];
  $temp2=$row['stuid'];
  
                $sql2="select * from msc_adm_temp where stuid='$temp2'";
                      $result_sql2=mysqli_query($conn, $sql2); 
                     
                if(mysqli_num_rows($result_sql2) <= 0){  
                    
                    $sql = "INSERT INTO msc_adm_temp(fname,stuid)
                        VALUES ('$temp1','$temp2')";

                                if ($conn->query($sql) === TRUE) {
                                    //echo "New record created successfully ";
                                } else {
                                     echo "Error: table msc_adm_temp 6" . $sql . "<br>" . $conn->error;
                                }

                    }
  }

echo "</table>";

echo "<br>"."<br>"."SC(Merit based)";
echo "<table border='1'>
<tr>
<th>Name</th>
<th>DOB</th>
<th>Category</th>
<th>percentage</th>
<th>Student ID</th>
</tr>";
 
while($row = mysqli_fetch_assoc($result7))
  {
  echo "<tr>";
  echo "<td>" . $row['fname']." ". $row['lname']. "</td>";
  echo "<td>" . $row['dob'] . "</td>";
  echo "<td>" . $row['category'] . "</td>";
  echo "<td>" . $row['ug_per'] . "</td>";
  echo "<td>" . $row['stuid']."</td>";
  echo "</tr>";
   $temp1=$row['fname'];
  $temp2=$row['stuid'];
  
                $sql2="select * from msc_adm_temp where stuid='$temp2'";
                      $result_sql2=mysqli_query($conn, $sql2); 
                     
                if(mysqli_num_rows($result_sql2) <= 0){  
                    
                    $sql = "INSERT INTO msc_adm_temp(fname,stuid)
                        VALUES ('$temp1','$temp2')";

                                if ($conn->query($sql) === TRUE) {
                                    //echo "New record created successfully ";
                                } else {
                                     echo "Error: table msc_adm_temp 7" . $sql . "<br>" . $conn->error;
                                }

                    }
  }

echo "</table>";

echo "<br>"."<br>"."ST(Entrance based)";
echo "<table border='1'>
<tr>
<th>Name</th>
<th>DOB</th>
<th>Category</th>
<th>percentage</th>
<th>Student ID</th>
</tr>";
 
while($row = mysqli_fetch_assoc($result8))
  {
  echo "<tr>";
  echo "<td>" . $row['fname']." ". $row['lname']. "</td>";
  echo "<td>" . $row['dob'] . "</td>";
  echo "<td>" . $row['category'] . "</td>";
  echo "<td>" . $row['ug_per'] . "</td>";
  echo "<td>" . $row['stuid']."</td>";
  echo "</tr>";
   $temp1=$row['fname'];
  $temp2=$row['stuid'];
  
                $sql2="select * from msc_adm_temp where stuid='$temp2'";
                      $result_sql2=mysqli_query($conn, $sql2); 
                     
                if(mysqli_num_rows($result_sql2) <= 0){  
                    
                    $sql = "INSERT INTO msc_adm_temp(fname,stuid)
                        VALUES ('$temp1','$temp2')";

                                if ($conn->query($sql) === TRUE) {
                                    //echo "New record created successfully ";
                                } else {
                                     echo "Error: table msc_adm_temp 8" . $sql . "<br>" . $conn->error;
                                }

                    }
  }

echo "</table>";


 if (!$mysqli->query($try2)) {
    printf("Errormessage: %s\n", $mysqli->error);
}

mysql_close($con);
?>
</body>
</html>
   