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

<h1> Lista de centros de acopio, sismo 2017. Clic en el nombre del centro de acopio para visualizar la necesidad de articulos. </h1>

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

		echo "<table class='rwd-table hide'>";
		for ($row=0; $row <= $nEntries; $row++) {

			echo "<tr class='tab'> \n";
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
<div class="fluid-container container-cancel">
	<table align="center" cellpadding="1" cellspacing="1" style="vertical-align: text-top">
		<tr>
	        <th>Nombre del Centro</th> 
			<th>Calle</th> 
			<th>Numero</th> 
			<th>Colonia</th> 
			<th>Codigo Postal</th> 
			<th>Delegacion/Municipio</th> 
			<th>Estado</th> 
			<th>Mapa</th> 
		</tr>
		<tbody id="container-page"></tbody>
	</table>
	<div class="panel-footer" align="center"><ul id="pagination-demo" class="pagination-sm"></ul></div>
</div>
<script>
var elementosVisibles = 10;
$(document).ready(function(){
  setPagination();
});
 function setPagination(){
  var totalElements = $(".rwd-table tbody tr:not(.tab)").length;
  var paginasTotales = Math.ceil(totalElements / (elementosVisibles -1));
  $("#container-page").html("");
  if($('#pagination-demo').data("twbs-pagination")) $('#pagination-demo').twbsPagination('destroy');
  $('#pagination-demo').twbsPagination({
    totalPages: paginasTotales,
    visiblePages: 7,
    onPageClick: function (event, page) {
      var inicio = ((elementosVisibles - 1) * page) - elementosVisibles + 1;
      var final = inicio + elementosVisibles -1;
      if(page < paginasTotales){
        $("#container-page").html($(".rwd-table tbody tr:not(.tab)").slice(inicio, final).clone().addClass('listaPageShow  flipInX animated'));
      }
      else{
        $("#container-page").html($(".rwd-table tbody tr:not(.tab)").slice(inicio,totalElements).clone().addClass('listaPageShow  flipInX animated'));
      }
    }
  });
}
</script>
</body>
</html>
