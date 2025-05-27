<?php
include_once DIR . '/../../config/connect.php';

$raw_data = file_get_contents('php://input');
$input = json_decode($raw_data, true); //Decodifica il JSON in un array associativo

$IDImmobile = $input['IDImmobile'];
$tipo = $input['tipo'];
$prezzoVendita = $input['prezzoVendita'];
$superficie = $input['superficie'];

$sql = "UPDATE immobili 
        SET tipo = '" . $tipo . "',
            prezzoVendita = '" . $prezzoVendita . "',
            superficie = '" .$superficie . "'
        WHERE IDImmobile ='" . $IDImmobile ."'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die('Update query failed :' . mysqli_error($conn));
} else {
   echo "Utente AGGIORNATO con successo";
}

http_response_code(200);
?>