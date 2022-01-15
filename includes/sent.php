<?php 
//access control redirect to index page 
if(!defined("IN_VIEW"))
{
      header("location:../index.php");
}
$sent_msges = getUserSent($conn,$_SESSION['login_mail']); //get sent mails data
$draft_msges =getUserDraft($conn,$_SESSION['login_mail']); //get drafted mails data
?>

<?php 
 //check to see if mailID parameter set in query string
if (isset($_GET['mailID'])) {
       
      $mailID= $_GET['mailID'];
      $getMail = mailDetails($conn,$mailID);
      $draftValue =  $getMail["j_mail_draft"];

      //identify that relevent mail is send mail or drafted mail by using j_mail_draft value
      
      if ($draftValue=='0') {   //if mail was sent mail
          //show that mail full details
          echo '  <nav class="login">
                      <h1>Sent email</h1>
                  </nav> 
                  <div class="msgbox">
                      <p><strong>Sent To: '.$getMail["j_mail_recipient_fullname"].' ( '.$getMail["j_mail_recipient_email"].')</strong></p>
                      <p><strong>Email Sent On:</strong> '.$getMail["j_mail_date"].'</p>
                      <p><strong>Subject:</strong><a href=""> '.$getMail["j_mail_subject"].'</a></p><br>
                      <p><strong>Email content:</strong></p>
                      <p class="msgtxt">'.$getMail["j_mail_text"].'</p>
                  </div>
              ';
      }

      else{  
          //if mail was drafted mail
          //show that mail full details
          echo '  <nav class="login">
                      <h1>Draft email</h1>
                  </nav> 

                  <div class="msgbox">
                      <p><strong>To be sent to: '.$getMail["j_mail_recipient_fullname"].' ( '.$getMail["j_mail_recipient_email"].')</strong></p>
                      <p><strong>Email saved On:</strong> '.$getMail["j_mail_date"].'</p>
                      <p><strong>Subject:</strong><a href=""> '.$getMail["j_mail_subject"].'</a></p><br>
                      <p><strong>Email content:</strong></p>
                      <p class="msgtxt">'.$getMail["j_mail_text"].'</p>
                  </div>
              ';
      }
      


      }
//when mailID parameter not set 
//echo All sent mails & drafted Mails
else{ ?>

        <nav class="login">
            <h1>Sent emails</h1>
        </nav>
          <div>
              <table>
                 <tr>
                    <th>Sent to</th>
                    <th>Email Subject</th>
                    <th>Received</th>
                 </tr>
              <tbody id="sentdata">
                            <!-- echo send mails that store in $sent_msges array using getUserSent() function -->
                            <?php     foreach ($sent_msges as $sentmsg) { 
                                            
                                            echo '
                                                <tr>
                                                    <td>'.$sentmsg['j_mail_recipient_fullname'].'</td>
                                                    <td class="msgsubject"><a href="index.php?show=sent&mailID='.$sentmsg['j_mail_id'].'">'.$sentmsg['j_mail_subject'].'</a></td>
                                                    <td>'.$sentmsg['j_mail_date'].'</td>
                                                </tr>
                                            ';
                            } ?>
              </tbody>
              </table>
        </div>

        <nav class="login">
            <h1>Draft/saved emails</h1>
        </nav>
          <div>
              <table>
                  <tr>
                      <th>Sent to</th>
                      <th>Email Subject</th>
                      <th>Received</th>
                  </tr>
              <tbody id="draftdata">
                      
                              <!-- echo drafted mails that store in $draft_msges array using getUserDraft() function -->
                              <?php  foreach ($draft_msges as $draftmsg) { 
                                            
                                            echo '
                                                <tr>
                                                    <td>'.$draftmsg['j_mail_recipient_fullname'].'</td>
                                                    <td class="msgsubject"><a href="index.php?show=sent&mailID='.$draftmsg['j_mail_id'].'">'.$draftmsg['j_mail_subject'].'</a></td>
                                                    <td>'.$draftmsg['j_mail_date'].'</td>
                                                </tr>
                                            ';
                                        } ?>
              </tbody>
              </table>
          </div>
          
<?php } ?>
