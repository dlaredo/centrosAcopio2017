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

  <title>Centros de acopio sismo 2017</title>

</head>

<body>

<h1> Lista de centros de acopio, sismo 2017. Click en el nombre del centro de acopio para visualizar la necesidad de articulos. </h1>

<?php

	$dbConnection = null;
	$fieldNamesCentroAcopio = array('Nombre del Centro', 'Calle', 'Numero', 'Colonia', 'Codigo Postal', 'Delegacion/Municipio', 'Estado', 'Mapa');

	require 'api/db_config.php';

	function createTable($tableName){

		global $dbConnection, $fieldNamesCentroAcopio;

		$queryStringGetAll = "SELECT * FROM " . $tableName;

		$mysql_resultGetAll = $dbConnection->query($queryStringGetAll);
		$nEntries = $mysql_resultGetAll->num_rows;
		$nFields = $mysql_resultGetAll->field_count;

		echo "<table class='rwd-table'>";
		for ($row=0; $row <= $nEntries; $row++) {

			echo "<tr> \n";
			if ($row==0){
				for ($col=1; $col <= $nFields-1; $col++) { 
					$p = $fieldNamesCentroAcopio[$col-1];
				   	echo "<th>$p</th> \n";
				}
			}
			else{

				$resultRow = $mysql_resultGetAll->fetch_row();

				for ($col=1; $col <= $nFields-1; $col++) { 
				   $p = $resultRow[$col];
				   if ($col == 1){
				   	$ubicacion = $resultRow[2] . " " . $resultRow[3] . ", " . $resultRow[4] . ",  C.P. " .$resultRow[5]. ", " .$resultRow[6]. ", " .$resultRow[7];
				   	echo "<td><a href=\"crud_table.php?val=$resultRow[0]&name=$resultRow[1]&location=$ubicacion\" target=_blank>$p</a></td>\n";
				   }
				   else if ($col == $nFields-1){
				   	echo "<td><a href=$p target=_blank>Ver mapa</a></td>\n";
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

	$dbConnection = connectDB();
	createTable("centro_acopio");

?>

</body>
</html>