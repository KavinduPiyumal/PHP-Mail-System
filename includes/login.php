<?php 
//access control redirect to index page
if(!defined("IN_VIEW"))
{
      header("location:../index.php");
}
  $error="" ; //use this show error message in login form

  //if login form submitted 
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    
           
           //if email and password fields empty
           if(empty($_POST["email"]) || empty($_POST["password"]))  
           {  
                $error = "Both Fields are required";   //echo this error message
           }
            //if email and password fields are set
           else{ 
                //prevent SQL injections
                $uemail = mysqli_real_escape_string($conn, $_POST["email"]);  
                $password = mysqli_real_escape_string($conn, $_POST["password"]);   
          
                //check about user inputed mail  in database mail
                $query = "SELECT * FROM j_login WHERE j_email = '$uemail'";  
                $result = mysqli_query($conn,$query); 

                //if user enetered mail found in database
                if (rowCounts($result) > 0) {
                        
                        while($row = mysqli_fetch_array($result))  
                        {   
                            //check password by convert hashed password using function
                            if(password_verify($password, $row["j_password"]))  
                            {    
                                 $_SESSION['login_mail'] =$row["j_email"]; //set session using user mail
                                 header("location:index.php?show=inbox");  //redirect to index page with setting show parameter in query index
                
                            }
                            //if password not matched  
                            else  
                            {  
                                 //echo error message
                                 $error = "Wrong Password ";  
                            }  
                        }  
                }
                //if user enetered mail not found in database
                else{
                     $error = "Email Not matched!Please Enter Your email";  //echo error this message 
                }
           } 
          


           
 }
 ?>
 <!-- login form -->
<nav class="login">
  <h1>Login to Jedimail</h1>
</nav>
<form method="POST" class="logform">
	<div style = "font-size:14px; color:#cc0000; margin-top:10px;margin-left:40px"><?php echo $error; ?></div>
  <div class="form-control">
  	<label>Your Email:</label>
  	<input type="text" name="email"/>
  </div>
  <div class="form-control">
  	<label>Your Password:</label>
  	<input type="password" name="password" />
  </div>
  <div class="form-control buttons"> 
  	<input type="submit" value="Login" name="submit" />
  	<input type="reset" value="Clear" />
  </div>
</form>