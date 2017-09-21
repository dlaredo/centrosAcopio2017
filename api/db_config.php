<?php

	function connectDB(){

		$serverAddress = "localhost";
		$username = "admin";
		$password = "admin";
		$dbname = "id2987913_sismo2017acopios";

		$mysqli = new mysqli($serverAddress, $username, $password, $dbname);

		// Check connection
		if ($mysqli->connect_error) {
			die("Connection failed: " . $mysqli->connect_error);
		}

		return $mysqli;
	}
?>