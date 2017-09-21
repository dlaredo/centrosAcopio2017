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

$tableName = 'articulos';

  require 'db_config.php';

  $mysqli = connectDB();

  $id  = $_POST["id"];
  $post = $_POST;

  $sql = "UPDATE articulos SET Nombre = '".$post['name']."', Cantidad = ".$post['amount'].", Prioridad = ".$post['priority'].", Categoria = '".$post['category']."'
    WHERE id = ".$id." and centro_acopio_id = ".$post["ca_id"].";";

  $result = $mysqli->query($sql);

  $sql = "SELECT * FROM articulos WHERE id = ".$id." and centro_acopio_id = " .$post["ca_id"]. ";"; 

  $result = $mysqli->query($sql);

  $data = $result->fetch_assoc();

  echo json_encode(utf8ize($data));

?>