<!DOCTYPE html>
<html>
<head>
	<title>Articulos Necesarios</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

	<script type="text/javascript">
    	 var url = "";
        </script>

        <script src="crud_table.js"></script>

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

	<div id='authenticated' data-id=0/>
	<?php

		$nameCentroAcopio = $_GET["name"];
		$locationCentroAcopio = $_GET["location"];

		echo "<div id='nameCentro' data-error='$nameCentroAcopio'/>";
		echo "<div id='locationCentro' data-error='$locationCentroAcopio'/>";
	?>

	<div class="container">
		<div class="row">
		    <div class="col-lg-12 margin-tb">					
		        <div class="pull-left">
		        	<?php

		        	$nameCentroAcopio = $_GET["name"];
					$locationCentroAcopio = $_GET["location"];

		        	echo "<h2> Lista de articulos necesarios para el centro de acopio $nameCentroAcopio, ubicado en $locationCentroAcopio. <br/><br/> La lista se muestra en orden descendente por prioridad de articulos.</h2><h3><b>Si deseas agregar algo a la lista o modificar algun item los datos de acceso son, usuario: <u>admin</u>, contraseña: <u>admin</u>. Por favor haz un uso consciente del servicio.</b></h3>"
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
				<th>Categoria</th>
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