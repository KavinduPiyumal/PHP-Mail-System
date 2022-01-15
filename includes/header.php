<?php 
//access control redirect to index page	
if(!defined("IN_VIEW"))
{
      header("location:../index.php");
}
?>
<!-- Page Header Navigatin area -->
<nav class='primary-nav'>
                <a href='index.php?show=inbox'>Inbox <span id='countinbox' style="visibility: hidden;"> (X)</span></a>
                <a href='index.php?show=sent'>Sent &amp; drafts</a>
                <a href='index.php?show=compose'>Write new email</a>
                <a href='includes/logout.php'>Logged in as <?php  
                 echo fullName($conn, $usermail); //display user full name using function
                ?> (logout)</a>
</nav>