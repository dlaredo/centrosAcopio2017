<?php
//header("Content-Type: application/json", true);
//at the very beginning start output buffereing
//ob_start();
//header("Content-Type: application/json; charset=utf-8;", true);

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

  $mysqli = connectDB();

  $user  = $_POST["user"];
  $pass  = $_POST["pass"];
  $ca_id = $_POST["ca_id"];
  $ca_name = $_POST["ca_name"];
  $ca_location = $_POST["ca_location"];

  $sql = "SELECT count(1) FROM usuarios WHERE username = '$user 'and pass = '$pass' and centro_acopio_id = $ca_id;";

  //echo json_encode(utf8ize($sql));

  $result = $mysqli->query($sql);

  $row = $result->fetch_array();

  $authenticated = $row[0];

 /* Send as JSON */

echo json_encode(utf8ize($authenticated));

?>