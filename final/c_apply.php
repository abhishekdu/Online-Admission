
<html>
<head>
<script>
function check_choice() {
    var x = document.getElementById("adm_cri").value;
  
    if(x==2)
   {
         alert("No Need to fill choice");
         document.getElementById("choice1").disabled = true;
          document.getElementById("choice2").disabled = true;
   }     
   else if(x==1 || x==3)
   {
          document.getElementById("choice1").disabled = false;
           document.getElementById("choice2").disabled = false;
   }
}   


function check_course() {
    var x = document.getElementById("c_name").value;
  
    if(x=='MCA')
   {
         alert("No Merit Based admission");
         
        document.getElementById("2").disabled = true;
        document.getElementById("3").disabled = true;
   }
   else  if(x=='MSc')
   {
       document.getElementById("3").disabled = false;
       document.getElementById("2").disabled = false;
     
   }

}

  function check_center()
  {

       var x = document.getElementById("choice1").value;
       var y = document.getElementById("choice2").value;
   
       if(x==y)
       {
         alert("Center same selected,Please change the choice");
         
         document.getElementById("choice1").value="";
         document.getElementById("choice2").value="";
       }
  }
   
</script>

        <title>New | Course Apply</title>          
    </head>
    <body> 

      <form action="c_apply_data.php" method="post">
      
        <h1>Student Application Form</h1>
        
        <fieldset>
          <legend><span class="number"></span>Course Info</legend>
         
          <label for="name">course Name:</label>
          <select id="c_name" name="c_name" onchange="check_course()">
            <option></option>
            <option>MCA</option>
            <option>MSc</option>
          </select>
          <br><br>
          choice 1:Entrance based*<br>
          choice 2:Merit Based*<br>
          choice 3:both Merit and Entrance Based*<br>
          *Please check eligibility criteria before applying
          <br><br>
          <label >Admission criteria</label>
          <select id="adm_cri" name="adm_criteria" onchange="check_choice()">
            <option></option>
            <option>1</option>
            <option id="2" >2</option>
            <option id="3" >3</option>
          </select>
          <br>
          <label >Center choice1</label>
          <select id="choice1" name="c_choice1" onchange="check_center()">
            <option></option>
            <option>Delhi</option>
            <option>Jaipur</option>
            <option>Chandigarh</option>
            <option>Lucknow</option>
            
          </select>
          <br>
          <label >Center choice2</label>
          <select id="choice2" name="c_choice2" onchange="check_center()" >
            <option></option>
            <option>Delhi</option>
            <option>Jaipur</option>
            <option>Chandigarh</option>
            <option>Lucknow</option>
          </select>
          
          </table>

          
        </fieldset>
        <button type="submit" >Submit</button>
      </form>
      
    </body>
</html>

<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
</style>
