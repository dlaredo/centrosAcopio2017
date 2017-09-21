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

	<div id='authenticated' data-id=1>

	<div class="container">
		<div class="row">
		    <div class="col-lg-12 margin-tb">					
		        <div class="pull-left">
		        	<?php

		        	$nameCentroAcopio = $_GET["name"];
					$locationCentroAcopio = $_GET["location"];

		        	echo "<h2> Lista de articulos necesarios para el centro de acopio $nameCentroAcopio, ubicado en $locationCentroAcopio. <br/><br/> La lista se muestra en orden descendente por prioridad de articulos. </h2>"
		        	?>
		        </div>
		        <div class="pull-right">
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
					  Crear entrada
				</button>
		        </div>
		    </div>
		</div>

		<table class='rwd-table'>
			<thead>
			    <tr>
				<th>Nombre</th>
				<th>Cantidad</th>
				<th>Prioridad</th>
				<th>Categoria</th>
				<th width="200px">Accion</th>
			    </tr>
			</thead>
			<tbody>
			</tbody>
		</table>

		<ul id="pagination" class="pagination-sm"></ul>

	        <!-- Create Item Modal -->
		<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Create Item</h4>
		      </div>

		      <div class="modal-body">
		      		<form data-toggle="validator" action="api/create.php" method="POST">

		      			<div class="form-group">
							<label class="control-label" for="name">Nombre:</label>
							<input type="text" name="nombre" class="form-control" data-error="Introduzca nombre." required />
							<div class="help-block with-errors"></div>
						</div>

						<div class="form-group">
							<label class="control-label" for="amount">Cantidad:</label>
							<input name="cantidad" class="form-control" data-error="Introduzca cantidad." required></input>
							<div class="help-block with-errors"></div>
						</div>

						<div class="form-group">
							<label class="control-label" for="priority">Prioridad:</label>
							<select name="prioridad" class="form-control" data-error="Defina prioridad." required>
							  <option value=0>Urgente</option>
							  <option value=1>Indispensable</option>
							  <option value=2>Muy necesario</option>
							  <option value=3>Necesario</option>
							</select>
							<!--<input type="text" name="prioridad" class="form-control" data-error="Please enter title." required />-->
							<div class="help-block with-errors"></div>
						</div>

						<div class="form-group">
							<label class="control-label" for="category">Categoria:</label>
							<select name="categoria" class="form-control" data-error="Defina categoria." required>
							  <option value="Viveres">Viveres</option>
							  <option value="Articulos de Rescate">Articulos de rescate</option>
							  <option value="Higiene">Higiene</option>
							  <option value="Miscelaneos">Miscelaneos</option>
							</select>
							<!--<textarea name="categoria" class="form-control" data-error="Please enter description." required></textarea>-->
							<div class="help-block with-errors"></div>
						</div>

						<div class="form-group">
							<button type="submit" class="btn crud-submit btn-success">Enviar</button>
						</div>

		      		</form>

		      </div>
		    </div>

		  </div>
		</div>

		<!-- Edit Item Modal -->
		<div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Edit Item</h4>
		      </div>

		      <div class="modal-body">
		      		<form data-toggle="validator" action="api/update.php" method="put">
		      			<input type="hidden" name="id" class="edit-id">

		      			<div class="form-group">
							<label class="control-label" for="name">Nombre:</label>
							<input type="text" name="nombre" class="form-control" data-error="Introduzca nombre." required />
							<div class="help-block with-errors"></div>
						</div>

						<div class="form-group">
							<label class="control-label" for="amount">Cantidad:</label>
							<input name="cantidad" class="form-control" data-error="Introduzca cantidad." required></input>
							<div class="help-block with-errors"></div>
						</div>

						<div class="form-group">
							<label class="control-label" for="priority">Prioridad:</label>
							<select name="prioridad" class="form-control" data-error="Defina prioridad." required>
							  <option value=0>Urgente</option>
							  <option value=1>Indispensable</option>
							  <option value=2>Muy necesario</option>
							  <option value=3>Necesario</option>
							</select>
							<!--<input type="text" name="prioridad" class="form-control" data-error="Please enter title." required />-->
							<div class="help-block with-errors"></div>
						</div>

						<div class="form-group">
							<label class="control-label" for="category">Categoria:</label>
							<select name="categoria" class="form-control" data-error="Defina categoria." required>
							  <option value="Viveres">Viveres</option>
							  <option value="Articulos de Rescate">Articulos de rescate</option>
							  <option value="Higiene">Higiene</option>
							  <option value="Miscelaneos">Miscelaneos</option>
							</select>
							<!--<textarea name="categoria" class="form-control" data-error="Please enter description." required></textarea>-->
							<div class="help-block with-errors"></div>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-success crud-submit-edit">Enviar</button>
						</div>

		      		</form>

		      </div>
		    </div>
		  </div>
		</div>

	</div>
</body>
</html>