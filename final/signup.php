<style>
 *:before, *:after {
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
  }
  
  body {
    font-family: 'Nunito', sans-serif;
    color: #384047;
  }
  
  form {
    max-width: 300px;
    margin: 10px auto;
    padding: 10px 20px;
    background: #f4f7f8;
    border-radius: 8px;
  }
  
  h1 {
    margin: 0 0 30px 0;
    text-align: center;
  }
  
  input[type="text"],
  input[type="password"],
  input[type="date"],
  input[type="datetime"],
  input[type="email"],
  input[type="number"],
  input[type="search"],
  input[type="tel"],
  input[type="time"],
  input[type="url"],
  textarea,
  select {
    background: rgba(255,255,255,0.1);
    border: none;
    font-size: 16px;
    height: auto;
    margin: 0;
    outline: 0;
    padding: 15px;
    width: 100%;
    background-color: #e8eeef;
    color: #8a97a0;
    box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
    margin-bottom: 30px;
  }
  
  input[type="radio"],
  input[type="checkbox"] {
    margin: 0 4px 8px 0;
  }
  
  select {
    padding: 6px;
    height: 32px;
    border-radius: 2px;
  }
  
  button {
    padding: 19px 39px 18px 39px;
    color: black;
    background-color: #000000 grey;
    font-size: 18px;
    text-align: center;
    font-style: normal;
    border-radius: 5px;
    width: 100%;
    border: 1px solid grey;
    border-width: 1px 1px 3px;
    box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
    margin-bottom: 10px;
  }
  
  fieldset {
    margin-bottom: 30px;
    border: none;
  }
  
  legend {
    font-size: 1.4em;
    margin-bottom: 10px;
  }
  
  label {
    display: block;
    margin-bottom: 8px;
  }
  
  label.light {
    font-weight: 300;
    display: inline;
  }
  
  .number {
    background-color: grey;
    color: #fff;
    height: 30px;
    width: 30px;
    display: inline-block;
    font-size: 0.8em;
    margin-right: 4px;
    line-height: 30px;
    text-align: center;
    text-shadow: 0 1px 0 rgba(255,255,255,0.2);
    border-radius: 100%;
  }
  
  @media screen and (min-width: 480px) {
  
    form {
      max-width: 480px;
    }
  
  }

</style>

<html>
<head>
        <title>New | admission</title> <!--addning title-->         
    </head>
    <body> 

      <form action="signup_data.php" method="post">
      
        <h1>Student Admission Form</h1>
        
        <fieldset>
          <legend><span class="number">1</span>Your Basic Info</legend>
         
          <label for="name">First Name:</label>
          <input type="text" id="name" name="user_fname">
          
          <label for="name">Last Name:</label>
          <input type="text" id="name" name="user_lname">

          <label for="name">Gender:</label>
          <select id="name" name="gender">
            <option></option>
            <option>Male</option>
            <option>Female</option>
            <option>Others</optin>
          </select>

          <label for="name">Date of Birth:</label>
          <input type="date" id="name" name="dob">

          <label for="name">Father Name:</label>
          <input type="text" id="name" name="father_name">

          <label for="name">Mobile No.:</label>
          <input type="text" id="name" name="mobile">

          <label for="name"> Local Address:</label>
          <input type="text" id="name" name="local_adds">

          <label for="name"> Parmanent Address:</label>
          <input type="text" id="name" name="parmanent_adds">

          <label for="name">Pwd Category:</label>
          <select id="name" name="pwd">
            <option></option>
            <option>Yes</option>
            <option>No</option>
          </select>

          <label for="name">Category</label>
          <select id="name" name="category">
            <option></option>
            <option>Unreserved</option>
            <option>OBC</option>
            <option>SC</optin>
            <option>ST</optin>
          </select>

          <label for="name"> Nationality:</label>
          <input type="text" id="name" name="nationality">

          <label for="mail">Email:</label>
          <input type="email" placeholder="abc@example.com" id="mail" name="user_email">

          
          <label for="mail">Password:</label>
          <input type="password" id="mail" name="user_pass">

          <legend><span class="number">2</span>Education Qualification</legend>
          
            
          <table style="width:100%">
          <tr>
            <th>Last Examination Passed</th>
            <th>Subject/Stream</th> 
            <th>Board/University</th>
            <th>Year</th>
            <th>Max Marks</th>
            <th>Marks Obtained</th>
            <th>Percentage</th>
          </tr>
          <tr>
            <td>
            <select id="name" name="intermediate">
                  <option></option>
                  <option value="12">XII</option>
                  <option value="12th equivalent">12 Equivalent</option>              
              </select>
            </td>
            <td>
            <select id="name" name="stream">
                  <option></option>
                  <option value="Science">Science</option>
                  <option value="Commerce">Commerce</option>
                  <option value="Humanities">Humanities</option>
              </select>
            </td>
            
            <td><input type="text" id="name" name="board"></td>
            <td><input type="text" id="name" name="year"></td>
            <td><input type="text" id="name" name="m_marks"></td>
            <td><input type="text" id="name" name="marks_obt"></td>
            <td><input type="text" id="name" name="per"></td>
          </tr>
          <tr>
            <td>
            <select id="name" name="under_grad">
                  <option></option>
                  <option value="B.sc">B.sc</option>
                  <option value="B.com">B.com</option>              
                  <option value="MA">MA</option>              
                  <option value="BCA">BCA</option>              
              </select>
            </td>
            <td><input type="text" id="name" name="ug_subject"></td>
            <td><input type="text" id="name" name="ug_board"></td>
            <td><input type="text" id="name" name="ug_year"></td>
            <td><input type="text" id="name" name="ug_m_marks"></td>
            <td><input type="text" id="name" name="ug_marks_obt"></td>
            <td><input type="text" id="name" name="ug_per"></td>            
          </tr>
         
          </table>

          
        </fieldset>
        <button type="submit">Submit</button>
      </form>
      
    </body>
</html>

<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
</style>