<?php
/**
* Assignment 2.
* 
* Log the user out and destroy all sessions 
* 
* @author Joshua Loo
* @date 2016-03-14
* @version 1
*/
	session_start();
	session_destroy();

	header('location:index.php');
	exit();
?>