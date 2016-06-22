<?php
/**
* Assignment 2.
* 
* Create a user account and redirects to the profile page 
* 
* @author Joshua Loo
* @date 2016-03-14
* @version 1
*/


//keep count of how many fields in the forms are valid 
$valid = 0;

include 'includes/database.php';

	if (isset($_POST["submit"])) {

		//email validation
		if (preg_match("/^([a-z]|[0-9])+@([a-z]|[0-9])+\.[a-z]{2,3}$/i", trim($_POST['email'])
			)){   

				// echo "set email <br>";
				$valid = $valid + 1;

			  }
		else{

				echo "
				<h4> Invalid email format</h4>
					 ";
			}

		//first name validation 
		if (preg_match("/^([a-z]|[0-9]){2,20}$/i", trim($_POST['firstname'])
			)){   

				// echo "set first name <br>";
				$valid = $valid + 1;

			  }
		else{

				echo "
				<h4> Invalid name</h4>
					 ";

			}			

		//last name validation 
		if (preg_match("/^([a-z]|[0-9]){2,20}$/i", trim($_POST['firstname'])
			)){   

				// echo "set last name <br>";
				$valid = $valid + 1;

			  }
		else{

				echo "
				<h4> Invalid name</h4>
					 ";

			}			

		//password validation 
		if (preg_match("/^([a-z]|[0-9]){6,15}$/i", trim($_POST['password'])
			)){   

				// echo "set password <br>";
				$valid = $valid + 1;

			  }
		else{

				echo "
				<h4> Invalid password format</h4>
					 ";

			}	

		if (preg_match("/^([a-z]|[0-9])+\.(jpeg|jpg)$/i", trim($_FILES['profile_picture']['name'])
			)){   

				// echo "set profile picture <br>";
				$valid = $valid + 1;

				//move and rename uploaded picture into profiles directory 
				$rename = "./profiles/" . $_POST['firstname'] . "-" . $_POST['lastname'] . "." . "jpg";
				move_uploaded_file($_FILES['profile_picture']['tmp_name'], $rename);
			
				  }
		else{

				echo "
				<h4> Invalid picture format</h4>
					 ";

			}	
	
	};//ends isset SUBMIT


	//if the user has filled in everything succesfully 
	if ($valid == 5){
 			//passes the information from the form and puts it into the $data array  				
			$data['password'] = $_POST['password'] ;
			$data['firstname'] = $_POST['firstname'] ;
			$data['lastname'] = $_POST['lastname'];
			$data['email'] = $_POST['email'] ;
			$data['profile_picture'] = $rename;
			
			//call the function 'save'
			save($data);
		
			//start session if everything is valid 
			session_start();
			$_SESSION['loggedin'] = true;
			$_SESSION['email'] = $_POST['email'];
			
			header('location:profile.php');
			exit();
		}

		
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Create Profile</title>
	</head>
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link href="css/animate.css" rel="stylesheet" />
<link href="css/main.css" rel="stylesheet" />

<body>

	<div class="container">

		<h2 class = "animated fadeInDownBig"> Create Profile</h2>
		<hr>
			<form action ='' method = 'post' enctype='multipart/form-data'  class = "animated fadeIn form">

				<div class="form-group">
				    <label>Email:</label><br>
				    <input type="email"  name = 'email' value = "">
				  </div>

				 <div class="form-group">
				    <label>First Name:</label><br>
				    <input type="text"  name = 'firstname' value = "">
				  </div>
				  
				  <div class="form-group">
				    <label>Last Name:</label><br>
				    <input type="text" name = 'lastname' value = "">
				  </div>

				  <div class="form-group">
				    <label>Set Password:</label><br>
				    <input type="password" name = 'password' value = "">
				  </div>

				  <div class="form-group">
				    <label>Upload profile picture:</label><br>
				    <input type="file" class = "btn btn-default" name = 'profile_picture' value ="">
				  </div>

			  <button type ="submit" name ="submit"class="btn btn-default">Submit</button> 
			  <button type ="submit" class ="btn btn-default" formaction ="index.php">Back</button>
			
			</form>	
	
	</div>
</body>



</html>