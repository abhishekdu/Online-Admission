<head>
<script>
function wrong_id_password() {
    alert("Your id or password is wrong !");
}
</script>
<html>
    <body onload="wrong_id_password()"> 

      <form action="pay_data.php" method="post">
      
      
      
        <h1>LOGIN PAGE</h1>
        
         
        Email:
          <input type="text" id="name" name="username">
          
          Password:
          <input type="password" id="name" name="password">
          
          <button type="submit">Login</button>
</body>
</html>