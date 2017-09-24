<!DOCTYPE html>
<html>
<head>
	<title>Art&iacute;culos Necesarios</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet" />
	<script type="text/javascript">
    	 var url = "";
        </script>

        <script src="crud_table.js"></script>

    <link rel="stylesheet" href="tabla.css">

  <style>
   body{font-family: 'Roboto Condensed', sans-serif !important;}
.red-color{    color: #e43;}
.green-color{    color: #2c7;}

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

</head>
<body>

	<div id='authenticated' data-id=0/>
	<?php

		$id = $_POST["id"];
		$nameCentroAcopio = $_POST["nombre"];
		$locationCentroAcopio = $_POST["ubicacion"];

		echo "
		   <form action='crud_table.php' method='post' target='_blank' id='invisible_form'>
		    <input type='hidden' id='fname'>
		    <input type='hidden' name='id' value='$id'>
		    <input type='hidden' name='name' value='$nameCentroAcopio'>
		    <input type='hidden' name='location' value='$locationCentroAcopio'>
		  </form>";

		
	?>

	<div class="container">
		<div class="row">
		    <div class="col-lg-12 margin-tb">					
		        <div class="pull-left">
		        	<?php

		        	$nameCentroAcopio = $_POST["nombre"];
					$locationCentroAcopio = $_POST["ubicacion"];

		        	echo "<h2> Lista de art&iacute;culos necesarios para el centro de acopio $nameCentroAcopio, ubicado en $locationCentroAcopio. <br/><br/> La lista se muestra en orden descendente por prioridad de art&iacute;culos.</h2><h3><b>Si deseas agregar algo a la lista o modificar alg&uacute;n &iacute;tem los datos de acceso son, <span class='red-color'>usuario: <u>admin</u></span>, <span class='red-color'>contraseña: <u>admin</u></span>. <br/><br/> <p class='green-color text-center'>Por favor haz un uso consciente del servicio</p></b></h3>"
		        	?>
		        </div>
		        <div class="pull-right">
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#login">
					  Log in
				</button>
		        </div>
		    </div>
		</div>

		<table class='rwd-table'>
			<thead>
			    <tr>
				<th>Nombre</th>
				<th>Prioridad</th>
				<th>Categor&iacute;a</th>
			    </tr>
			</thead>
			<tbody>
			</tbody>
		</table>

		<ul id="pagination" class="pagination-sm"></ul>

		    <!-- Login Modal -->
		<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Autenticarse</h4>
		      </div>

		      <div class="modal-body">
		      		<form data-toggle="validator" action="api/login.php" method="POST">

		      			<div class="form-group">
							<label class="control-label" for="user">Nombre de usuario:</label>
							<input type="text" name="user" class="form-control" data-error="Ingrese nombre de usuario." required />
							<div class="help-block with-errors"></div>
						</div>

						<div class="form-group">
							<label class="control-label" for="pass">Contraseña:</label>
							<input type = 'password' name="pass" class="form-control" data-error="Ingrese contraseña." required></input>
							<div class="help-block with-errors"></div>
						</div>

						<div class="form-group">
							<button type="submit" class="btn crud-login btn-success">Enviar</button>
						</div>

		      		</form>

		      </div>
		    </div>

		  </div>
		</div>

	</div>
</body>
</html>