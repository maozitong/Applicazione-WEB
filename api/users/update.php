<?php
include_once(CONNECT_DB_PATHFILE);

$raw_data = file_get_contents('php://input');
$input = json_decode($raw_data, true); //Decodifica il JSON in un array associativo

$nome = $input['name'];
$email = $input['email'];

$sql = "UPDATE users SET email = '" . $email . "' WHERE name ='" . $nome ."'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die('Update query failed :' . mysqli_error($conn));
} else {
   echo "Utente AGGIORNATO con successo";
}

http_response_code(200);
?>