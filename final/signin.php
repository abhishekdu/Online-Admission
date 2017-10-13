<html>
<?php
session_start();

if(isset($_SESSION['uname']) && isset($_SESSION['pass'] )){
  $msg="You are already logged in";
  $_SESSION['msg']=$msg;
  header("location: signin_data.php");
}
else{
  $SESSION = array();
  session_destroy();
}
?>


    <body> 

      <form action="verify.php" method="post">
      
        <h1>LOGIN PAGE</h1>
        
         
        Email:
          <input type="text" id="name" name="username">
          
          Password:
          <input type="password" id="name" name="password">
          
           
          
          <button type="submit">Login</button>
         <br> <a href ="forget.php">Forget your password</a>
</body>
</html>