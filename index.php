<!DOCTYPE html>
<html>
<head>

  <meta http-equiv="content-type" content="text/html;charset=utf-8" />

  <link rel="stylesheet" href="tabla.css">

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

     <script src="datatables/jquery.dataTables.min.js"></script>
    <script src="datatables/dataTables.colVis.min.js"></script>
    <script src="datatables/dataTables.tableTools.min.js"></script>
    <script src="datatables/dataTables.bootstrap.min.js"></script>
    <script src="datatables/datatables.responsive.min.js"></script>

    <link href="datatables/smartadmin-production-plugins.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet" />

  <style>
 body{font-family: 'Roboto Condensed', sans-serif !important;}

	/* unvisited link */
	a:link {
	    color: white; text-decoration: underline;
	}

	/* visited link */
	a:visited {
	    color: white; text-decoration: underline;
	}

	/* mouse over link */
	a:hover {
	    color: hotpink; text-decoration: underline;
	}

	/* selected link */
	a:active {
	    color: white; text-decoration: underline;
	}

  .button-link {
     background:none!important;
     color:inherit;
     border:none; 
     padding:0!important;
     font: inherit;
     /*border is optional*/
     border-bottom:1px solid #444; 
     cursor: pointer;
     text-decoration: underline;
}

.rwd-table-2 {
  margin: 1em 0;
  min-width: 300px;
}
.rwd-table-2 tr {
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
}
.rwd-table-2 th {
  display: none;
}
.rwd-table-2 td {
  display: block;
}
.rwd-table-2 td:first-child {
  padding-top: .5em;
}
.rwd-table-2 td:last-child {
  padding-bottom: .5em;
}
.rwd-table-2 td:before {
  content: attr(data-th) ": ";
  font-weight: bold;
  width: 6.5em;
  display: inline-block;
}
@media (min-width: 480px) {
  .rwd-table-2 td:before {
    display: none;
  }
}
.rwd-table-2 th, .rwd-table-2 td {
  text-align: left;
}
@media (min-width: 480px) {
  .rwd-table-2 th, .rwd-table-2 td {
    display: table-cell;
    padding: .25em .5em;
  }
  .rwd-table-2 th:first-child, .rwd-table-2 td:first-child {
    padding-left: 0;
  }
  .rwd-table-2 th:last-child, .rwd-table-2 td:last-child {
    padding-right: 0;
  }
}


.rwd-table-2 {
  background: #34495E;
  color: #fff;
  border-radius: .4em;
  overflow: hidden;
}
.rwd-table-2 tr {
  border-color: #46637f;
}
.rwd-table-2 th, .rwd-table-2 td {
  margin: .5em 1em;
}
@media (min-width: 480px) {
  .rwd-table-2 th, .rwd-table-2 td {
    padding: 1em !important;
  }
}
.rwd-table-2 th, .rwd-table-2 td:before {
  color: #dd5;
}
.rwd-table {
    background: #34495e !important;
}
.rwd-table th, .rwd-table td:before {
    color: #ec0 !important;
}
table.dataTable thead .sorting_asc, table.dataTable thead .sorting_desc {
    background-color: white !important;
}
  </style>

  <title>Centros de acopio sismo 2017</title>

</head>

<body>

<div class="container">
  <div class="well">
    <h1>Lista de centros de acopio, sismo 2017.</h1> 
    <h3>Clic en el nombre del centro de acopio para visualizar la necesidad de art&iacute;culos.</h3> 
    <p class="text-right"><button type="button" class="btn btn-success" onclick="window.location.replace('crear_centro.html');">
    Agregar Centro
  </button></p>
  </div>
</div>

<div class="container-fluid">
<?php

    $dbConnection = null;
    $fieldNamesCentroAcopio = array('Nombre del Centro', 'Calle', 'N&uacute;mero', 'Colonia', 'C&oacute;digo Postal', 'Del/Mpio', 'Zona', 'Estado', 'Tel&eacute;fono', 'Contacto', 'Horarios', 'Tipo Centro', 'Mapa', "Verificado");

    require 'api/db_config.php';
	

    function createTable($tableName){

        global $dbConnection, $fieldNamesCentroAcopio;

        $queryStringGetAll = "SELECT * FROM " . $tableName;

        $mysql_resultGetAll = $dbConnection->query($queryStringGetAll);
        $nEntries = $mysql_resultGetAll->num_rows;
        $nFields = $mysql_resultGetAll->field_count;

        echo "<table class='table rwd-table'>";
        for ($row=0; $row <= $nEntries; $row++) {

            if ($row==0){
              echo "<thead><tr class='tab'> \n";
                for ($col=1; $col <= $nFields-1; $col++) { 
                    $p = $fieldNamesCentroAcopio[$col-1];
                       echo "<th>$p</th> \n";
                }
				echo "<th>&nbsp</th>";
                echo "</thead><tbody>\n";
            }
            else{
                echo "<tr> \n";
                $resultRow = $mysql_resultGetAll->fetch_row();

                for ($col=1; $col < $nFields; $col++) { 
                   $p = $resultRow[$col];
                   if ($col == 1){
                       $ubicacion = $resultRow[2] . " " . $resultRow[3] . ", " . $resultRow[4] . ",  C.P. " .$resultRow[5]. ", " .$resultRow[6]. ", " .$resultRow[7];
                       echo "<td>

                           <form action='crud_table.php' method='post' target='_blank'>
                            <input type='hidden' id='fname'>
                            <input type='hidden' name='id' value='$resultRow[0]'>
                            <input type='hidden' name='nombre' value='$resultRow[1]'>
                            <input type='hidden' name='ubicacion' value='$ubicacion'>
                            <input type='submit' value='$p' class='button-link'>
                          </form>";
                   }
                   else if ($col == $nFields-2){
                       echo "<td><a href=$p target=_blank>Ver mapa</a></td>\n";
                   }
                   else if ($col == $nFields-1){
                      if($p == '' || $p == 0){$p='No Verificado';}
                      else{$p='Verificado';}


                       echo "<td>$p</td>\n";
                   }
                   else{
                       echo "<td>$p</td> \n";
                   }
                }
				echo "<td>

          <form action='editar_centro.php' method='post' target='_self'>
            <input type='hidden' id='fname'><br>
            <input type='hidden' name='id' value='$resultRow[0]'>
            <input type='hidden' name='nombre' value='$resultRow[1]'>
            <input type='hidden' name='calle' value='$resultRow[2]'>
            <input type='hidden' name='numero' value='$resultRow[3]'>
            <input type='hidden' name='colonia' value='$resultRow[4]'>
            <input type='hidden' name='cp' value='$resultRow[5]'>
            <input type='hidden' name='del_mpio' value='$resultRow[6]'>
            <input type='hidden' name='zona' value='$resultRow[7]'>
            <input type='hidden' name='estado' value='$resultRow[8]'>
            <input type='hidden' name='telefono' value='$resultRow[9]'>
            <input type='hidden' name='contacto' value='$resultRow[10]'>
            <input type='hidden' name='horario' value='$resultRow[11]'>
            <input type='hidden' name='tipo' value='$resultRow[12]'>
            <input type='hidden' name='urlMapa' value='$resultRow[13]'>
            <input type='hidden' name='verificado' value='$resultRow[14]'>
            <input type='submit' value='Editar' class='btn btn-success'>
          </form>";
            }
              echo "</tr>";
            }
        echo "</tbody></table>";
    }

    
	$dbConnection = connectDB();
	
    createTable("centro_acopio");

?>
</div>

<script>
var elementosVisibles = 10;
$(document).ready(function(){
  /*setPagination();*/
  var responsiveHelper_dt_basic = undefined;
            var breakpointDefinition = {
                tablet: 1024,
                phone: 480
            };

  $('.rwd-table').dataTable({
                "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>" +
                        "t" +
                        "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
                "autoWidth": true,
                "oLanguage": {
                    "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
                },
                "preDrawCallback": function () {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelper_dt_basic) {
                        responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('.rwd-table'), breakpointDefinition);
                    }
                },
                "rowCallback": function (nRow) {
                    responsiveHelper_dt_basic.createExpandIcon(nRow);
                },
                "drawCallback": function (oSettings) {
                    responsiveHelper_dt_basic.respond();
                }
            });

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
<br/>
<br/>
</body>
</html>