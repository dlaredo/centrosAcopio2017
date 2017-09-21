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
 $ca_id = $_POST["ca_id"];

 $sql = "DELETE FROM articulos WHERE id = ".$id." and centro_acopio_id = " .$ca_id. ";";

 $result = $mysqli->query($sql);

 echo json_encode(utf8ize($id));

?>