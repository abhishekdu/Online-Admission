<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "login";

$fname = $_POST['user_fname'];
$lname = $_POST['user_lname'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$faname = $_POST['father_name'];
$mobile = $_POST['mobile'];
$ladds= $_POST['local_adds'];
$padds= $_POST['parmanent_adds'];
$pwd = $_POST['pwd'];
$category = $_POST['category'];
$nationality = $_POST['nationality'];
$email= $_POST['user_email'];
$pass = $_POST['user_pass'];

$inter = $_POST['intermediate'];
$stream = $_POST['stream'];
$board = $_POST['board'];
$year = $_POST['year'];
$m_marks = $_POST['m_marks'];
$marks_obt = $_POST['marks_obt'];
$per = $_POST['per'];
$under_grad = $_POST['under_grad'];
$ug_sub = $_POST['ug_subject'];
$ug_board = $_POST['ug_board'];
$ug_year = $_POST['ug_year'];
$ug_m_marks = $_POST['ug_m_marks'];
$ug_marks_obt = $_POST['ug_marks_obt'];
$ug_per= $_POST['ug_per'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


    $random1 = '17CSCl';
    $try='SELECT count(*) FROM login_info';
    $result=mysqli_query($conn, $try); 
        

    if(mysqli_num_rows($result) > 0){  
        while($row = mysqli_fetch_assoc($result)){  

            $random2 = $row['count(*)'];
        } //end of while  
    }else{  
        echo "0 results";  
    }  


    $random2=$random2+234;
    $random = $random1.$random2;

 
// $count=1;
    $temp="SELECT COUNT(*) FROM login_info WHERE email='$email'";
    $res=mysqli_query($conn, $temp); 
 
    $qwe=0;

    if ($conn->query($temp) == TRUE)
    {
        $qwe=0;
        
             while($row1 = mysqli_fetch_assoc($res)){  
                $qwe = $row1['COUNT(*)'];

                }
           
            if($qwe>=1)
            {

	            echo "This Email ID already exist!!";
                echo("</br>");
                echo "Try something else !";
	        }
            else 
            {         

                
               
                $sql = "INSERT INTO login_info(fname,lname,dob,email,pass,stuid)
                VALUES ('$fname','$lname','$dob','$email','$pass','$random')";
                 
                $sql1 = "INSERT INTO stu_info(fname,lname,gender,dob,category,pwd,faname,mobile,ladds,padds,stuid)
                VALUES ('$fname','$lname','$gender','$dob','$category','$pwd','$faname','$mobile','$ladds','$padds','$random')";
                
                $sql2 = "INSERT INTO edu_inter_info(intermediate,stream,board,year,m_marks,marks_obt,per,stuid)
                VALUES ('$inter','$stream','$board','$year','$m_marks','$marks_obt','$per','$random')";

                $sql3 = "INSERT INTO edu_ug_info(under_grad,ug_subject,ug_board,ug_year,ug_m_marks,ug_marks_obt,ug_per,stuid)
                VALUES ('$under_grad','$ug_sub','$ug_board','$ug_year','$ug_m_marks','$ug_marks_obt','$ug_per','$random')";    

                $flag=1;
                        if ($conn->query($sql) === TRUE) {
                           // echo "New record created successfully ";
                        } else {
                            echo "Error: table login_info" . $sql . "<br>" . $conn->error;
                            $flag=0;
                        }


                        if ($conn->query($sql1) === TRUE) {
                            //echo "New record created successfully ";
                        } else {
                            echo "Error: table stu_info " . $sql . "<br>" . $conn->error;
                            $flag=0;
                        }


                        if ($conn->query($sql2) === TRUE) {
                            //echo "New record created successfully ";
                        } else {
                            echo "Error: table edu_inter_info " . $sql . "<br>" . $conn->error;
                            $flag=0;
                        }
                        
                        
                        if ($conn->query($sql3) === TRUE) {
                            //echo "New record created successfully ";
                        } else {
                            echo "Error: table edu_ug_info " . $sql . "<br>" . $conn->error;
                            $flag=0;
                        }
                        
                          if($flag==1)
                          {
                              echo "New Record Created Successfully";
                              echo '<a href="index.php">HOME</a>';
                          }

            }
  }
 else{

    echo "Error: 1" . $temp . "<br>" . $conn->error; 
    
    }   


$conn->close();
?>