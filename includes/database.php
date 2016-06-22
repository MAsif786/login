<?php
/**
* Assignment 2.
* 
* Provides functions that helps the user navigate through the page
* 
* @author Joshua Loo
* @date 2016-03-14
* @version 1
*/
include "includes/configure.php";


	function login($email, $password){
		//if email exists
		$link = connect();
		$query = "select * from users where email = '". $email ."'
						             and password = '". $password ."'
				  ";

			//hold the results of the query into a variable
			$results = mysqli_query($link, $query);
			$row = mysqli_fetch_array($results);

			//if there is a count, then there is a login !
			if (count($row))
			{
				return true;
			}
			else
			{
				return false;
			}
	}

	// puts the data into database 

	function save($data){
		$link = connect();
		$query = "insert into users values(
			null,
			'" .$data['password'] ."' ,
			'" .$data['firstname'] ."',
			'" .$data['lastname'] ."' ,
			'" .$data['email'] ."' ,
			'" .$data['profile_picture'] ."'
		)";

		mysqli_query($link, $query);
	}

		// 	return true;

		// // else email doesn't exist
		// }

	function getProfile($email){
		//return all information based on the email address 
						
			$link = connect();
			$query = "select * from users where email = '$email' ";
			
			$results = mysqli_query($link, $query);
			$row = mysqli_fetch_array($results);

				$profile['firstname'] = $row['firstname'] ;
				$profile['lastname'] = $row['lastname'];
				$profile['email'] = $row ['email'];
				$profile['profile_picture'] = $row['profile_picture'];


			return $profile;

		}





?>