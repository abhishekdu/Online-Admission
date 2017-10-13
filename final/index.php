<?php
session_start();

if(isset($_SESSION['uname']) && isset($_SESSION['pass'] )){
 	echo '<a href="logout.php">Log out</a>';
}
?>


<html>

<head>
<title>DU ADMISSION</title>

</head>

    <body> 

      
        <h1>DU ADMISSION </h1>
       
        <b ><a href="signin.php">SIGN IN</a></b>
        <b ><a href="signup.php">SIGN UP</a></b>
        <b ><a href="result.php">Result</a></b>
        <b ><a href="pay.php">Pay</a></b>
 
</body>
</html>
