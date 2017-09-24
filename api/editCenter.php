<?php

header("Content-Type: application/json; charset=utf-8;", true);

function utf8ize($d) {
    if (is_array($d)) 
        foreach ($d as $k => $v) 
            $d[$k] = utf8ize($v);

     else if(is_object($d))
        foreach ($d as $k => $v) 
            $d->$k = utf8ize($v);

     else 
        return utf8_encode($d);

    return $d;
}

require 'db_config.php';

  $inserted = 0;
  $mysqli = connectDB();
  $data = '';

  $post = $_POST;
  $cp = 0;
  if($post['cp'] != ''){$cp = $post['cp'];}
  $id = $post['id'];
  $Nombre = $post['name'];
  $Calle = $post['street'];
  $Numero = $post['number'];
  $Colonia = $post['neigh'];
  $Del_Mpio = $post['county'];
  $Zona = $post['area'];
  $Estado = $post['state'];
  $Telefono = $post['phone'];
  $Contacto = $post['contact'];
  $Horarios = $post['hours'];
  $TipoCentro = $post['kind'];
  $UrlMapa = $post['map'];
  $verificado = $post['verified'] === 'true'? 1: 0;

  $sql = "
    UPDATE centro_acopio
	SET Nombre = '$Nombre',
		Calle = '$Calle',
		Numero = '$Numero',
		Colonia = '$Colonia',
		CodigoPostal = $cp,
		Del_Mpio = '$Del_Mpio',
		Zona = '$Zona',
		Estado = '$Estado',
		Telefono = '$Telefono',
		Contacto = '$Contacto',
		Horarios = '$Horarios',
		TipoCentro = '$TipoCentro',
		UrlMapa = '$UrlMapa',
    Verificado = '$verificado'
	WHERE id = $id;
  ";

  //$data = $sql;
  
  
  $result = $mysqli->query($sql);


  $data = 1;
  if($result == false){
    $data=$mysqli->error;
  }

  //echo $inserted;

  echo json_encode(utf8ize($data));

?>