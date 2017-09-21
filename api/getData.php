<?php
//header("Content-Type: application/json", true);
//at the very beginning start output buffereing
//ob_start();
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

$num_rec_per_page = 10;
$tableName = 'articulos';

$mysqli = connectDB();

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$ca_id = $_GET["ca_id"];

$start_from = ($page-1) * $num_rec_per_page;

$sql = "SELECT * FROM " . $tableName . " WHERE centro_acopio_id = $ca_id ORDER BY prioridad ASC LIMIT $start_from, $num_rec_per_page;";

$result = $mysqli->query($sql);
$nEntries = $result->num_rows;
$nFields = $result->field_count;

  while($row = $result->fetch_assoc()){

     $json[] = $row;

  }

  $data['data'] = $json;

  $result = $mysqli->query("select count(1) FROM " .$tableName. " where centro_acopio_id = $ca_id;");
  $row = $result->fetch_array();

  $data['total'] = $row[0];

// right before outputting the JSON, clear the buffer.
//ob_end_clean();
 /* Send as JSON */

echo json_encode(utf8ize($data));

?>