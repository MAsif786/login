<?php
/**
* Assignment 2.
* 
* Display the user's details on the page 
* 
* @author Joshua Loo
* @date 2016-03-14
* @version 1
*/

session_start();

// include 'includes/configure.php';
include 'includes/database.php';

	if (!isset($_SESSION['loggedin'])){
		
		header('location:login.php');
		exit();
	}

	else{

		//get the element from the array 
		$user = getProfile($_SESSION['email']);
		
	}

?>

<!DOCTYPE html>
<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link href="css/main.css" rel="stylesheet" />
<link href="css/animate.css" rel="stylesheet" />
<style>
		
		img{
			width:250px;
			height:250px;
		}


</style>

	<div class="container">
		
	<h2 class = "animated fadeInDownBig"> Your Profile Page</h2>
	<hr>

		<img class = "animated fadeInDown" src = "<?php echo $user['profile_picture']; ?>">
				
		<h1 class = "animated fadeInRight name">Welcome, <?php echo $user['firstname'] . ' ' . $user['lastname'];?></h1>

		<h2 class = "animated fadeInRight email"><?php echo $user['email'];?></h2>

	</div>
	
	<hr>

		<div class= "container">
			<a href = "Logout.php" class ="btn btn-default">Logout</a>
		</div>

</html>