<?php
include_once(CONNECT_DB_PATHFILE);

$raw_data = file_get_contents('php://input');
$input = json_decode($raw_data, true); //Decodifica il JSON in un array associativo

$tipo = $input['tipo'];
$prezzoVendita = $input['prezzoVendita'];

$sql = "UPDATE immobili SET superficie = '" . $superficie . "' WHERE tipo ='" . $tipo ."'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die('Update query failed :' . mysqli_error($conn));
} else {
   echo "Utente AGGIORNATO con successo";
}

http_response_code(200);
?>