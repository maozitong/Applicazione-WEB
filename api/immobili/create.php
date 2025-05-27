<?php
include_once __DIR__ . '/../../config/connect.php';

//Per leggere i dati in arrivo da un form in formato JSON
$_POST = json_decode(file_get_contents("php://input"), true);

//echo json_encode($_POST);

$tipo = $_POST['tipo'];
$prezzoVendita = $_POST['prezzoVendita'];
$superficie = $_POST['superficie'];

$sql = "INSERT INTO immobili (name, gender, email, mobile, address) VALUES 
    ('" . $tipo . "', '" . $prezzoVendita . "', '" . $prezzoVendita . "')";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die('Update query failed :' . mysqli_error($conn));
} else {
    echo "Utente AGGIUNTO con successo";
}

http_response_code(200);
?>