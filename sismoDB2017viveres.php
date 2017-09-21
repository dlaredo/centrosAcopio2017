<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="tabla.css">

  <style>

	/* unvisited link */
	a:link {
	    color: red;
	}

	/* visited link */
	a:visited {
	    color: gray;
	}

	/* mouse over link */
	a:hover {
	    color: hotpink;
	}

	/* selected link */
	a:active {
	    color: blue;
	}

  </style>

</head>

<body>

<?php

	$dbConnection = null;
	$fieldNamesArticulos = array('Nombre', 'Cantidad', 'Prioridad', 'Categoria');
	$priorityMapping = array('Urgente', 'Indispensable', 'Muy necesario', 'Necesario');
	$idCentroAcopio = $_GET["val"];
	$nameCentroAcopio = $_GET["name"];
	$locationCentroAcopio = $_GET["location"];

	function connectDB(){

		$serverAddress = "localhost";
		$username = "dlaredorazo";
		$password = "@Dexsys13";
		$dbname = "sismo2017acopios";

		$mysqli = new mysqli($serverAddress, $username, $password, $dbname);

		// Check connection
		if ($mysqli->connect_error) {
		    die("Connection failed: " . $mysqli->connect_error);
		} 

		return $mysqli;
	}

	function createTable($tableName, $centro_acopio_id){

		global $dbConnection, $fieldNamesArticulos, $priorityMapping;

		$queryStringGetAll = "SELECT * FROM " . $tableName . " WHERE centro_acopio_id = $centro_acopio_id ORDER BY prioridad ASC";

		$mysql_resultGetAll = $dbConnection->query($queryStringGetAll);
		$nEntries = $mysql_resultGetAll->num_rows;
		$nFields = $mysql_resultGetAll->field_count;

		echo "<table class='rwd-table'>";
		for ($row=0; $row <= $nEntries; $row++) {

			echo "<tr> \n";
			if ($row==0){
				for ($col=2; $col <= $nFields-1; $col++) { 
					$p = $fieldNamesArticulos[$col-2];
				   	echo "<th>$p</th> \n";
				}
			}
			else{

				$resultRow = $mysql_resultGetAll->fetch_row();

				for ($col=2; $col <= $nFields-1; $col++) { 
				   $p = $resultRow[$col];

				   if($col==4){
				   	$p = $priorityMapping[$p];
				   	echo "<td>$p</td> \n";
				   }
				   else{
				   	echo "<td>$p</td> \n";
				   }
				}
			}
		  	echo "</tr>";
		}
		echo "</table>";
	}

	
	echo "<h1> Lista de articulos necesarios para el centro de acopio $nameCentroAcopio, ubicado en $locationCentroAcopio. La lista se muestra en orden descendente por prioridad de articulos. </h1>"
	$dbConnection = connectDB();
	createTable("articulos", $idCentroAcopio);

?>

</body>
</html>
