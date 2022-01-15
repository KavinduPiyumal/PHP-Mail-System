 <?php  
//access control redirect to index page 
if(!defined("IN_VIEW"))
{
      header("location:../index.php");
}
    $error=""; //for display eror
    
    //if email submited
    if(isset($_POST['send']) || isset($_POST['draft'])) {
        //check mail content emty
        if(empty($_POST["content"]) )  {  
             $error = "Please Fill Msg Content";  
        } 
        //if mail content found 
        else{
           //prevent SQL injections
           $fname = mysqli_real_escape_string($conn, $_POST["fname"]);  
           $emailR = mysqli_real_escape_string($conn, $_POST["email"]);  
           $subject = mysqli_real_escape_string($conn, $_POST["subject"]);  
           $content = mysqli_real_escape_string($conn, $_POST["content"]); 
           $sendermail = $_SESSION['login_mail'];
           $sendername = fullName($conn, $usermail);
           //if user pressed sent button, perform this query and insert data to databse as sent email
           if (isset($_POST['send'])) {
               $query = "INSERT INTO j_mail (`j_mail_id`, `j_mail_recipient_email`, `j_mail_recipient_fullname`, `j_mail_sender_email`, `j_mail_sender_fullname`, `j_mail_subject`, `j_mail_text`, `j_mail_date`, `j_mail_draft`) VALUES (default,'$emailR','$fname','$sendermail','$sendername','$subject','$content',now(),0)";  
               $result = mysqli_query($conn,$query);  
           }
           //if user pressed dfrat button, perform this query  and insert data to databse as drafted email
           elseif (isset($_POST['draft'])) {
               $query = "INSERT INTO j_mail (`j_mail_id`, `j_mail_recipient_email`, `j_mail_recipient_fullname`, `j_mail_sender_email`, `j_mail_sender_fullname`, `j_mail_subject`, `j_mail_text`, `j_mail_date`, `j_mail_draft`) VALUES (default,'$emailR','$fname','$sendermail','$sendername','$subject','$content',now(),1)";  
               $result = mysqli_query($conn,$query);  
           }
          //after perform query redirect to index.php
          if($result)  
          {  
              header('Location:index.php');
          }  
          else  
          {  
                 
          }  
         }
}
?>
<!-- compose form  -->
 <nav class="login">
  <h1>Compose a new email</h1>
</nav>
<form method="POST" class="logform">
	<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
  <div class="form-control">
    <label>Recipient Full name:</label>
    <input type="text" name="fname" required/>
  </div>
  <div class="form-control">
  	<label>Recipient Full email:</label>
  	<input type="email" name="email" required/>
  </div>
  <div class="form-control">
    <label>Email subject:</label>
    <input type="text" name="subject" required/>
  </div>
  <div class="form-control">
  	<label>Email Text content:</label>
  	<textarea name="content" rows="4" cols="20"></textarea>
  </div>
  <div class="form-control buttons compose"> 
  	<input type="submit" value="Send Email" name="send" />
    <input type="submit" value="Save draft" name="draft" class="draftb" />
  	<input type="reset" value="Clear contents" />
  </div>
 
</form>