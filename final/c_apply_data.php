<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "login";

$c_name = $_POST['c_name'];
$adm_criteria = $_POST['adm_criteria'];
$c_choice1 = $_POST['c_choice1'];
$c_choice2 = $_POST['c_choice2'];
$stuid =  $_SESSION['id'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$random=rand(-10,200);
if($c_name=="MCA")
{
    if($adm_criteria=="1" or $adm_criteria=="3")
        {

            $sql1 = "UPDATE edu_ug_info
                    SET ug_entrance_mca = $random
                    WHERE stuid = '$stuid' ";

        }    
        else
        {
                $sql1 = "UPDATE edu_ug_info
                    SET ug_entrance_mca = '-200'
                    WHERE stuid = '$stuid'";
        }
                        if ($conn->query($sql1) === TRUE) {
                            //echo "New record created successfully ";
                        } else {
                            echo "Error: table edu_ug_info" . $sql . "<br>" . $conn->error;
                        }

                $sql = "INSERT INTO mca_adm(adm_criteria,c_choice1,c_choice2,stuid)
                VALUES ('$adm_criteria','$c_choice1','$c_choice2','$stuid')";

                        if ($conn->query($sql) === TRUE) {
                            echo "New record created successfully ";
                            echo "<br>".'<a href="signin_data.php">HOME</a>';
                        } else {
                           echo "Already applied";
                           echo "<br>".'<a href="signin_data.php">HOME</a>';
                           // echo "Error: table mca_adm" . $sql . "<br>" . $conn->error;
                        }

}
else if($c_name=="MSc")
{   
    if($adm_criteria=="1" or $adm_criteria=="3")
        {
            $sql1 = "UPDATE edu_ug_info
                    SET ug_entrance_msc = $random
                    WHERE stuid = '$stuid'";
        }    
        else
        {
            $sql1 = "UPDATE edu_ug_info
                    SET ug_entrance_msc = '-200'
                    WHERE stuid = '$stuid'";
        }
                        if ($conn->query($sql1) === TRUE) {
                            //echo "New record created successfully ";
                        } else {
                            echo "Error:MSC table edu_ug_info" . $sql . "<br>" . $conn->error;
                        }


    $sql = "INSERT INTO msc_adm(adm_criteria,c_choice1,c_choice2,stuid)
                VALUES ('$adm_criteria','$c_choice1','$c_choice2','$stuid')";

                        if ($conn->query($sql) === TRUE) {
                            echo "New record created successfully ";
                            echo "<br>".'<a href="signin_data.php">HOME</a>';
                        } else {
                            echo "Already applied";
                            echo "<br>".'<a href="signin_data.php">HOME</a>';
                            //echo "Error: table mca_adm" . $sql . "<br>" . $conn->error;
                        }


}


$conn->close();
?>