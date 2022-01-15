<?php 

//for get number of rows in result query
function rowCounts($query){		
	return mysqli_num_rows($query);
}
// for get logged user full name, using j_user table and j_login table
function fullName($con,$usermail){
	$query = "SELECT * FROM j_user INNER JOIN j_login ON j_user.j_user_id=j_login.j_id WHERE j_email = '$usermail'";
	$sql = mysqli_query($con, $query);
    $rw = mysqli_fetch_array($sql);
    $fname = $rw["j_user_fname"];
    $lname = $rw["j_user_lname"];

return  $fname.' '.$lname; //return full name
}
// for get mail full details using relevent mailID
function mailDetails($con,$mailID){
	    $query = "SELECT * from j_mail WHERE j_mail_id=$mailID";
		$sql = mysqli_query($con, $query);
		$rw = mysqli_fetch_array($sql);
		return $rw;
}
// for get logged user,  inbox details
function getUserInbox($conn,$usermail){
	$sql = mysqli_query($conn, "SELECT * from j_mail WHERE j_mail_recipient_email='$usermail' AND j_mail_draft =0 ORDER BY j_mail_date DESC");
	return $sql;
}
// for get logged user sent mail details
function getUserSent($conn,$usermail){
	$sql = mysqli_query($conn, "SELECT * from j_mail WHERE j_mail_sender_email='$usermail' AND j_mail_draft='0' ORDER BY j_mail_date DESC");
	return $sql;
}
// for get logged user draft mail details
function getUserDraft($conn,$usermail){
	$sql = mysqli_query($conn, "SELECT * from j_mail WHERE j_mail_sender_email='$usermail' AND j_mail_draft='1'  ORDER BY j_mail_date DESC");
	return $sql;
}
?>