<?php 
//access control redirect to index page
if(!defined("IN_VIEW"))
{
      header("location:../index.php");
}
//check to see if mailID parameter set in query string
//then show full mail deteils using that mailID parameter value
 if (isset($_GET['mailID'])) {  ?>
        <nav class="login">
             <h1>Inbox Email</h1>
        </nav>

        <?php
             $mailID= $_GET['mailID']; //get mailID paramenter value
             $getMail = mailDetails($conn,$mailID); //get that mail details using mailDetails Function
        //display relavent mail details
        echo '<div class="msgbox">
                  <p><strong>Sender:</strong> '.$getMail["j_mail_sender_fullname"].' ( '.$getMail["j_mail_sender_email"].')</p>
                  <p><strong>Email Sent On:</strong> '.$getMail["j_mail_date"].'</p>
                  <p><strong>Subject:</strong><a href=""> '.$getMail["j_mail_subject"].'</a></p><br>
                  <p><strong>Email content:</strong></p>
                  <p class="msgtxt">'.$getMail["j_mail_text"].'</p>
              </div>'; 
        ?>

  <?php 
  } 
  //if not set mailID parameter then show normal Inbox view
  else{ 
  ?>
        <nav class="login">
            <h1>Inbox</h1>
        </nav>
        <div>
            <table>
              <tr>
                 <th>From</th>
                 <th>Email Subject</th>
                 <th>Recieved</th>
              </tr>

            <tbody id="inboxdata"> 
            <!-- ajax passes inbox details to inside tbody -->    
            <tbody>
            </table>
        </div> 
  <?php   
  } 
  ?>