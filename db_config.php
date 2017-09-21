<?php

	function connectDB(){

		define (DB_USER, "dlaredorazo");
		define (DB_PASSWORD, "@Dexsys13");
		define (DB_DATABASE, "sismo2017acopios");
		define (DB_HOST, "localhost");
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

		// Check connection
		if ($mysqli->connect_error) {
			die("Connection failed: " . $mysqli->connect_error);
		} 
	}
?>