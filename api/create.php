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

  $priority_inv_mapping = ['Urgente' => 0, 'Indispensable' => 1, 'Muy necesario' => 2, 'Necesario' => 3];

  $mysqli = connectDB();

  $post = $_POST;
  #$priority = $priority_inv_mapping[$post['priority']];

  $sql = "INSERT INTO articulos (centro_acopio_id, Nombre, Cantidad, Prioridad, Categoria) 

	VALUES (" .$post['ca_id']. ",'" .$post['name']. "', " .$post['amount']. ", " .$post['priority']. ", '" .$post['category']. "');";

  $result = $mysqli->query($sql);

  //echo $sql;

  /*if($result == False){
  	echo $mysqli->error;
  }*/

  $sql = "SELECT * FROM " . $tableName . " Order by id desc LIMIT 1"; 

  $result = $mysqli->query($sql);

  $data = $result->fetch_assoc();

  echo json_encode(utf8ize($data));

?>