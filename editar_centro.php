<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Editar Centro</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-validation.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.9.0/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.9.0/sweetalert2.min.css">
</head>
<?php
$id = $_POST["id"];
$Nombre = $_POST["nombre"];
$Calle = $_POST["calle"];
$Numero = $_POST["numero"];
$Colonia = $_POST["colonia"];
$CodigoPostal = $_POST["cp"];
$Del_Mpio = $_POST["del_mpio"];
$Zona = $_POST["zona"];
$Estado = $_POST["estado"];
$Telefono = $_POST["telefono"];
$Contacto = $_POST["contacto"];
$Horarios = $_POST["horario"];
$TipoCentro = $_POST["tipo"];
$URLMapa = $_POST["urlMapa"];
$verificado = $_POST["verificado"];


echo "
    <div class=\"main-content\">

        <!-- You only need this form and the form-validation.css -->

        <form class=\"form-validation\" method=\"post\" action=\"api/editCenter.php\" id=\"editarCentro\">

            <div class=\"form-title-row\">
                <h1>Editar Centro de Acopio</h1>
            </div>

            <div class=\"form-row form-input-name-row form-input-asterisk\">

                <label>
                    <span><i class='fa fa-asterisk'></i> Nombre del Centro</span>
                    <input type=\"text\" name=\"nombre\" value=\"$Nombre\">
                </label>


                <!--
                    Add these three elements to every form row. They will be shown by the
                    .form-valid-data and .form-invalid-data classes (see the JS for an example).
                -->

                <span class=\"form-valid-data-sign\"><i class=\"fa fa-check\"></i></span>

                <span class=\"form-invalid-data-sign\"><i class=\"fa fa-close\"></i></span>
                <span class=\"form-invalid-data-info\"></span>

            </div>

            <div class=\"form-row form-input-name-row form-input-asterisk\">

                <label>
                    <span><i class='fa fa-asterisk'></i> Calle</span>
                    <input type=\"text\" name=\"calle\" value=\"$Calle\">
                </label>

                <!--
                    Add these three elements to every form row. They will be shown by the
                    .form-valid-data and .form-invalid-data classes (see the JS for an example).
                -->

                <span class=\"form-valid-data-sign\"><i class=\"fa fa-check\"></i></span>

                <span class=\"form-invalid-data-sign\"><i class=\"fa fa-close\"></i></span>
                <span class=\"form-invalid-data-info\"></span>

            </div>

            <div class=\"form-row form-input-name-row form-input-asterisk\">

                <label>
                    <span><i class='fa fa-asterisk'></i> N&uacute;mero</span>
                    <input type=\"text\" name=\"numero\" value=\"$Numero\">
                </label>

                <!--
                    Add these three elements to every form row. They will be shown by the
                    .form-valid-data and .form-invalid-data classes (see the JS for an example).
                -->

                <span class=\"form-valid-data-sign\"><i class=\"fa fa-check\"></i></span>

                <span class=\"form-invalid-data-sign\"><i class=\"fa fa-close\"></i></span>
                <span class=\"form-invalid-data-info\"></span>

            </div>


            <div class=\"form-row form-input-name-row form-input-asterisk\">

                <label>
                    <span><i class='fa fa-asterisk'></i> Colonia</span>
                    <input type=\"text\" name=\"colonia\" value=\"$Colonia\">
                </label>

                <!--
                    Add these three elements to every form row. They will be shown by the
                    .form-valid-data and .form-invalid-data classes (see the JS for an example).
                -->

                <span class=\"form-valid-data-sign\"><i class=\"fa fa-check\"></i></span>

                <span class=\"form-invalid-data-sign\"><i class=\"fa fa-close\"></i></span>
                <span class=\"form-invalid-data-info\"></span>

            </div>

            <div class=\"form-row form-input-name-row\">

                <label>
                    <span>C&oacute;digo Postal</span>
                    <input type=\"text\" name=\"cp\" value=\"$CodigoPostal\">
                </label>


            </div>

            <div class=\"form-row form-input-name-row form-input-asterisk\">

                <label>
                    <span><i class='fa fa-asterisk'></i> Del/Mpio</span>
                    <input type=\"text\" name=\"del_mpio\" value=\"$Del_Mpio\">
                </label>

                <!--
                    Add these three elements to every form row. They will be shown by the
                    .form-valid-data and .form-invalid-data classes (see the JS for an example).
                -->

                <span class=\"form-valid-data-sign\"><i class=\"fa fa-check\"></i></span>

                <span class=\"form-invalid-data-sign\"><i class=\"fa fa-close\"></i></span>
                <span class=\"form-invalid-data-info\"></span>

            </div>

            <div class=\"form-row form-input-name-row\">

                <label>
                    <span>Zona</span>
                    <input type=\"text\" name=\"zona\" value=\"$Zona\">
                </label>

            </div>

            <div class=\"form-row form-input-name-row form-input-asterisk\">

                <label>
                    <span><i class='fa fa-asterisk'></i> Estado</span>
                    <input type=\"text\" name=\"estado\" value=\"$Estado\">
                </label>

                <!--
                    Add these three elements to every form row. They will be shown by the
                    .form-valid-data and .form-invalid-data classes (see the JS for an example).
                -->

                <span class=\"form-valid-data-sign\"><i class=\"fa fa-check\"></i></span>

                <span class=\"form-invalid-data-sign\"><i class=\"fa fa-close\"></i></span>
                <span class=\"form-invalid-data-info\"></span>

            </div>

            <div class=\"form-row form-input-name-row\">

                <label>
                    <span>Tel&eacute;fono</span>
                    <input type=\"text\" name=\"tel\" value=\"$Telefono\">
                </label>

            </div>

            <div class=\"form-row form-input-name-row\">

                <label>
                    <span>Contacto</span>
                    <input type=\"text\" name=\"contacto\" value=\"$Contacto\">
                </label>


            </div>

            <div class=\"form-row form-input-name-row\">

                <label>
                    <span>Horarios</span>
                    <input type=\"text\" name=\"horario\" value=\"$Horarios\">
                </label>

            </div>

            <div class=\"form-row form-input-name-row\">

                <label>
                    <span>Tipo Centro</span>
                    <input type=\"text\" name=\"tipo\" value=\"$TipoCentro\">
                </label>

            </div>

            <div class=\"form-row form-input-name-row\">

                <label>
                    <span>Mapa</span>
                    <input type=\"text\" name=\"mapa\" value=\"$URLMapa\">
                </label>

            </div>

            <div class=\"form-row\">

                <label class=\"form-checkbox\">
                    <span>Verificado</span>
                    <input type=\"checkbox\" name=\"verificado\" value='$verificado'>
                    <input type=\"hidden\" name=\"id\" value = \"$id\">
                </label>

            </div>

            <div class=\"form-row\">

                <button type =\"button\" id = \"editarCentro-submit\">Editar</button>

            </div>

        </form>
";
?>
    </div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>

<script>

    $(document).ready(function() {

        // Here is how to show an error message next to a form field

        var errorField = $('.form-input-asterisk');

        // Adding the form-invalid-data class will show
        // the error message and the red x for that field

/*        errorField.addClass('form-invalid-data');
        errorField.find('.form-invalid-data-info').text('Por favor llene este campo');
*/

        // Here is how to mark a field with a green check mark

        errorField.find("input").on("blur",function(){
            var $parentRow =  $(this).parentsUntil(".form-input-asterisk").parent();
            if($(this).val() !== ''){
                $parentRow.addClass('form-valid-data');        
                $parentRow.removeClass('form-invalid-data');
            }
            else{
                $parentRow.removeClass('form-valid-data');        
                $parentRow.addClass('form-invalid-data');
                $parentRow.find('.form-invalid-data-info').text('Por favor llene este campo');

            }

        });

        isVerified = $("#editarCentro").find("input[name='verificado']").val()
        if(isVerified == 1){$("#editarCentro").find("input[name='verificado']").prop('checked', true);}
        
    });

    /* Login */
    $("#editarCentro-submit").click(function(e){
    //alert('editandocentro')

    var form_action = $("#editarCentro").attr("action");

    var nombre = $("#editarCentro").find("input[name='nombre']").val();
	//alert('Nombre:' + nombre);
    var calle = $("#editarCentro").find("input[name='calle']").val();
    //alert('calle:' +calle);
	var numero = $("#editarCentro").find("input[name='numero']").val();
	//alert('numero:' +numero);
    var colonia = $("#editarCentro").find("input[name='colonia']").val();
	//alert('colonia:' +colonia);
    var cp = $("#editarCentro").find("input[name='cp']").val();
	//alert('cp:' +cp);
    var del_mpio = $("#editarCentro").find("input[name='del_mpio']").val();
	//alert('del_mpio:' +del_mpio);
    var zona = $("#editarCentro").find("input[name='zona']").val();
	//alert('zona:' +zona);
    var estado = $("#editarCentro").find("input[name='estado']").val();
	//alert('estado:' +estado);
    var telefono = $("#editarCentro").find("input[name='tel']").val();
	//alert('telefono:' +telefono);
    var contacto = $("#editarCentro").find("input[name='contacto']").val();
	//alert('contacto:' +contacto);
    var horario = $("#editarCentro").find("input[name='horario']").val();
	//alert('horario:' +horario);
    var tipo = $("#editarCentro").find("input[name='tipo']").val();
	//alert('tipo:' +tipo);
    var mapa = $("#editarCentro").find("input[name='mapa']").val();
	//alert('mapa:' +mapa);
    //var verificado = $("#editarCentro").find("checkbox[name='verificado']").val();
	var id = $("#editarCentro").find("input[name='id']").val();
    var verificado = $("#editarCentro").find("input[name='verificado']").is(":checked");

    var url = ''

    console.log(nombre + " " + calle + " " + numero + " " + colonia + " " + cp + " " + del_mpio + " " + zona + " " + 
        estado + " " + telefono + " " + contacto + " " + horario + " " + tipo + " " + mapa + " " + verificado + " " + id);

    if(nombre != '' && calle != '' && numero != '' && colonia != '' && del_mpio != '' && estado != ''){
		console.log('Entra al if');

swal({
  title: '¿Sus datos son correctos?',
  text: "Si desea verificar los datos de clic en cancelar, de otro modo de clic en continuar",
  type: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Continuar',
  cancelButtonText: 'Cancelar',
  showLoaderOnConfirm: true,
  preConfirm: function () {
    return new Promise(function (resolve, reject) {
		console.log('Entra en la funcion promise');
      $.ajax({
            dataType: 'json',
            //contentType: "application/json",//note the contentType defintion
            type:'POST',
            url: url + form_action,
            data:{name:nombre, street:calle, number:numero, neigh:colonia, cp:cp, county:del_mpio, area:zona, state:estado, 
                phone:telefono, contact:contacto, hours:horario, kind:tipo, map:mapa, verified:verificado, id:id}
        }).done(function(data){
			
			console.log('entra a la function(data)');
			
            $("#editarCentro").find("input[name='nombre']").val();
            $("#editarCentro").find("input[name='calle']").val();
            $("#editarCentro").find("input[name='numero']").val();
            $("#editarCentro").find("input[name='colonia']").val();
            $("#editarCentro").find("input[name='cp']").val();
            $("#editarCentro").find("input[name='del_mpio']").val();
            $("#editarCentro").find("input[name='zona']").val();
            $("#editarCentro").find("input[name='estado']").val();
            $("#editarCentro").find("input[name='tel']").val();
            $("#editarCentro").find("input[name='contacto']").val();
            $("#editarCentro").find("input[name='horario']").val();
            $("#editarCentro").find("input[name='tipo']").val();
            $("#editarCentro").find("input[name='mapa']").val();
			$("#editarCentro").find("input[name='id']").val();
            $("#editarCentro").find("checkbox[name='verificado']").val();

            console.log('esto es data:', data)

            if(data == 1){resolve();}
            else
            {
                reject('Registro no agregado.');
				//resolve();
                console.log('no agregado');
            }
        }).fail(function(data){ reject('Registro no agregado2.');console.log('fallo en agregar',data) });
    });
  },
  allowOutsideClick: false
}).then(function () {
      swal({
      title: 'Creado exitosamente',
      text: "Serás redireccionado a la página principal",
      type: 'success',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'De acuerdo',
      cancelButtonText: 'Añadir más',
    }).then(function () {
        window.location.replace("index.php");
    });
 $('.form-valid-data').removeClass("form-valid-data");        
 $('.form-invalid-data').removeClass("form-invalid-data");
});

       
    }else{
        swal({
      title: 'Forma incompleta',
      html: "Los campos con <i class='fa fa-asterisk'></i> son obligatorios",
      type: 'error',
      showCancelButton: false,
      confirmButtonColor: '#d33',
      confirmButtonText: 'Entendido',

    }).then(function () {
        var errorField = $('.form-input-asterisk');

        // Adding the form-invalid-data class will show
        // the error message and the red x for that field

/*        errorField.addClass('form-invalid-data');
        errorField.find('.form-invalid-data-info').text('Por favor llene este campo');
*/

        // Here is how to mark a field with a green check mark

        errorField.find("input").each(function(i,a){

            var $parentRow =  $(a).parentsUntil(".form-input-asterisk").parent();
            if($(a).val() !== ''){
                $parentRow.addClass('form-valid-data');        
                $parentRow.removeClass('form-invalid-data');
            }
            else{
                $parentRow.removeClass('form-valid-data');        
                $parentRow.addClass('form-invalid-data');
                $parentRow.find('.form-invalid-data-info').text('Por favor llene este campo');

            }

        });

     $(".form-invalid-data").first().find("input").focus();
    });
    }

});


</script>

</body>

</html>
