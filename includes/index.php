<?php
    session_start();
	include('db.php');
    include('functions.php');
    if (isset($_SESSION['login_mail'])) {
    	$usermail= $_SESSION['login_mail'];
    }
    //using getUserInbox function , get all inbox messeges that relevent to user
    $result = getUserInbox($conn,$usermail);
    //push that inbox mails to array
    $data = array();
    while ($row = mysqli_fetch_object($result))
       {
           array_push($data, $row);
       }
    //encode it as json for using that data in scripts,js file
    echo json_encode($data);
?>