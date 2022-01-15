<?php
	/*
	 * 
	 * index.php - the main homepage file for this template
	 * 
	 */
	
	define("IN_VIEW",true);
    // Initialize the session
    session_start();
	include('includes/db.php');
    include('includes/functions.php');
    if (isset($_SESSION['login_mail'])) {
    	$usermail= $_SESSION['login_mail'];
    }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>JediMail</title>

	<!-- Link to the CSS reset file, Normalize.css 
		 Author: Nicolas Gallagher
		 URL: https://necolas.github.io/normalize.css/
		 Date accessed: 31 Oct 2021
	-->
	<link rel="stylesheet" href="css/normalize.css">


	<!-- Link to the main stylesheet for this template -->
	<link rel="stylesheet" href="css/main.css?v=<?php echo time(); ?>">
	
</head>
<body>

	<header id="homepg-banner" class="pg-banner">
		<h1><a href="index.php">JediMail</a></h1>
	</header>

	

	<main id="homepg-main-content" class="pg-main-content">
		<?php 

            //if login session not created , then display login page in here
            if (!isset($_SESSION['login_mail'])) {
            	include('includes/login.php');
            	
            }
            //if login session is set , then display header area and ibox,sent box views
            else {
            	require_once("includes/header.php");
            	//if show variable set in url then show relevent pages
            	if (isset($_GET['show'])) {
            		 $show=$_GET['show'];
                     require_once("includes/".$show.".php");
            	}
            	//if not set show variable then display inbox view 
            	else{
            		require_once("includes/inbox.php");
            	}
            	
            }

		    


		 ?>
	</main>

	
    <?php include('includes/footer.php'); ?>
	<!-- Link to the main JavaScript file for the template -->
    <script src="js/scripts.js"></script>
 
</body>
</html>