$( document ).ready(function() {

var page = 1;
var current_page = 1;
var total_page = 0;
var is_ajax_fire = 0;
var centro_acopio_id = getParameterByName("val", window.location.href)
var priority_mapping = ['Urgente', 'Indispensable', 'Muy necesario', 'Necesario']
var priority_inv_mapping = {'Urgente':0, 'Indispensable':1, 'Muy necesario':2, 'Necesario':3}
var category_inv_mapping = {'Viveres':0, 'Articulos de rescate':1, 'Higiene':2, 'Miscelaneos':3}
var authenticated = 0

manageData();

/* get parameter from url*/
function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

/* manage data list */
function manageData() {
    $.ajax({
        dataType: 'json',
        contentType: "application/json",//note the contentType defintion
        url: url+'api/getData.php',
        data: {page:page, ca_id:centro_acopio_id}
    }).done(function(data){
    	total_page = Math.ceil(data.total/10);
    	current_page = page;

        authenticated = $('#authenticated').attr("data-id")

        //alert(total_page)

    	$('#pagination').twbsPagination({
	        totalPages: total_page,
	        visiblePages: 5,
            first:'Primera',
            last:'Ultima',
            prev:'Previa',
            next:'Siguiente',
	        onPageClick: function (event, pageL) {
	        	page = pageL;
                if(is_ajax_fire != 0){
	        	  getPageData();
                }
	        }
	    });
        console.log('chido en manageData')
    	manageRow(data.data);
        is_ajax_fire = 1;

    }).fail(function(data){ console.log('fallo en manageData')});

}

/* Get Page Data*/
function getPageData() {
	$.ajax({
    	dataType: 'json',
        contentType: "application/json",//note the contentType defintion
    	url: url+'api/getData.php',
    	data: {page:page, ca_id:centro_acopio_id}
	}).done(function(data){
        console.log('chido en getPage')
		manageRow(data.data);
	}).fail(function(data){ console.log('fallo en getPageData')});
}

/* Add new Item table row */
function manageRow(data) {
	var	rows = '';
	$.each( data, function( key, value ) {
	  	rows = rows + '<tr>';
	  	rows = rows + '<td>'+value.Nombre+'</td>';
        if(authenticated == 1){ rows = rows + '<td>'+value.Cantidad+'</td>'; }
        rows = rows + '<td>'+priority_mapping[value.Prioridad]+'</td>';
        rows = rows + '<td>'+value.Categoria+'</td>';
	  	rows = rows + '<td data-id="'+value.id+'">';

        if(authenticated == 1){
            rows = rows + '<button data-toggle="modal" data-target="#edit-item" class="btn btn-primary edit-item">Editar</button> ';
            rows = rows + '<button class="btn btn-danger remove-item">Eliminar</button>';
        }
        rows = rows + '</td>';
	  	rows = rows + '</tr>';
	});

	$("tbody").html(rows);
}

/* Login */
$(".crud-login").click(function(e){
    e.preventDefault();
    var form_action = $("#login").find("form").attr("action");
    var user = $("#login").find("input[name='user']").val();
    var pass = $("#login").find("input[name='pass']").val();
    var name = $("#nameCentro").attr("data-error");
    var location = $("#locationCentro").attr("data-error");

    if(user != '' && pass != ''){
        $.ajax({
            dataType: 'json',
            //contentType: "application/json",//note the contentType defintion
            type:'POST',
            url: url + form_action,
            data:{user:user, pass:pass, ca_id:centro_acopio_id, ca_name:name, ca_location:location}
        }).done(function(data){
            $("#login").find("input[name='user']").val('');
            $("#login").find("input[name='pass']").val('');

            if(data == 1)
            {
                console.log('autenticado')
                window.location.replace("crud_table_admin.php?val=" + centro_acopio_id + "&name=" + name + "&location=" + location);
            }
            else
            {
                console.log('no autenticado')
            }
            $(".modal").modal('hide');
        }).fail(function(){ console.log('fallo en login') });
    }else{
        alert('Por favor llene todos los campos')
    }

});

/* Create new Item */
$(".crud-submit").click(function(e){
    e.preventDefault();
    var form_action = $("#create-item").find("form").attr("action");
    var nombre = $("#create-item").find("input[name='nombre']").val();
    var cantidad = $("#create-item").find("input[name='cantidad']").val();
    var prioridad = $("#create-item").find("select[name='prioridad']").val();
    var categoria = $("#create-item").find("select[name='categoria']").val();

    if(nombre != '' && cantidad != '' && prioridad != '' && categoria != ''){
        $.ajax({
            dataType: 'json',
            //contentType: "application/json",//note the contentType defintion
            type:'POST',
            url: url + form_action,
            data:{ca_id:centro_acopio_id, name:nombre, amount:cantidad, priority:prioridad, category:categoria}
        }).done(function(data){
            $("#create-item").find("input[name='nombre']").val('');
            $("#create-item").find("input[name='cantidad']").val('');
            $("#create-item").find("select[name='prioridad']").val('');
            $("#create-item").find("select[name='categoria']").val('');
            getPageData();
            $(".modal").modal('hide');
            toastr.success('Articulo creado.', 'Success Alert', {timeOut: 5000});

            console.log('chido en create new')
        }).fail(function(){ console.log('fallo en create new') });
    }else{
        alert('Por favor llene todos los campos')
    }

});

/* Remove Item */
$("body").on("click",".remove-item",function(){
    var id = $(this).parent("td").data('id');
    var c_obj = $(this).parents("tr");

    var r = confirm("¿Seguro que  desea eliminar la entrada?");

    console.log('eliminando')

    if(r == true){

        $.ajax({
        dataType: 'json',
        //contentType: "application/json",//note the contentType defintion
        type:'POST',
        url: url + 'api/delete.php',
        data:{id:id, ca_id:centro_acopio_id}
    }).done(function(data){
        console.log(data)
        c_obj.remove();
        toastr.success('Articulo eliminado.', 'Success Alert', {timeOut: 5000});
        getPageData();
    }).fail(function(){ console.log('fallo en delete') });

    }

});

/* Edit Item */
$("body").on("click",".edit-item",function(){

    var id = $(this).parent("td").data('id');
    var name = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").text();
    var amount = $(this).parent("td").prev("td").prev("td").prev("td").text();
    var priority = $(this).parent("td").prev("td").prev("td").text();
    var category = $(this).parent("td").prev("td").text();

    priority = priority_inv_mapping[priority]

    $("#edit-item").find("input[name='nombre']").val(name);
    $("#edit-item").find("input[name='cantidad']").val(amount);
    $("#edit-item").find("select[name='prioridad']").val(priority);
    $("#edit-item").find("select[name='categoria']").val(category);
    $("#edit-item").find(".edit-id").val(id);

});

/* Updated new Item */
$(".crud-submit-edit").click(function(e){

    e.preventDefault();
    var form_action = $("#edit-item").find("form").attr("action");
    
    var nombre = $("#edit-item").find("input[name='nombre']").val();
    var cantidad = $("#edit-item").find("input[name='cantidad']").val();
    var prioridad = $("#edit-item").find("select[name='prioridad']").val();
    var categoria = $("#edit-item").find("select[name='categoria']").val();
    var id = $("#edit-item").find(".edit-id").val();

    if(nombre != '' && cantidad != '' && prioridad != '' && categoria != ''){
        $.ajax({
            dataType: 'json',
            //contentType: "application/json",//note the contentType defintion
            type:'POST',
            url: url + form_action,
            data:{ca_id:centro_acopio_id, id:id, name:nombre, amount:cantidad, priority:prioridad, category:categoria}
            //data:{title:title, description:description,id:id}
        }).done(function(data){
            console.log('chido en update')
            getPageData();
            $(".modal").modal('hide');
            toastr.success('Articulo actualizado.', 'Success Alert', {timeOut: 5000});
        }).fail(function(){ alert('fallo en update') });
    }else{
        alert('Por favor llene todos los campos')
    }

});
});