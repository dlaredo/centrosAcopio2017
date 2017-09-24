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
  $verificado = $post['verified'] === 'true'? 1: 0;

  $sql = "INSERT INTO centro_acopio (Nombre, Calle, Numero, Colonia, CodigoPostal, Del_Mpio, Zona, Estado, Telefono, Contacto, Horarios, TipoCentro, UrlMapa, Verificado) 

	VALUES ('" .$post['name']. "','" .$post['street']. "', '" .$post['number']. "', '" .$post['neigh']. "', '" .$cp. "', '" .$post['county']. "',
'" .$post['area']. "', '" .$post['state']. "', '" .$post['phone']. "', '" .$post['contact']. "', '" .$post['hours']. "', '" .$post['kind']. "', '" .$post['map']. "', '" .$verificado."');";

  //$data = $sql;
  $result = $mysqli->query($sql);

  if($result != False){
    $result = $mysqli->query("INSERT INTO usuarios (username, pass, centro_acopio_id) values ('admin', 'admin', $mysqli->insert_id)");
    if($result != False){ $data = 1; }
    else{ $data=$mysqli->error; }
  }
  else{ $data=$mysqli->error; }

  //echo $inserted;

  echo json_encode(utf8ize($data));

?>