<?php
include_once(CONNECT_DB_PATHFILE);

//Per leggere i dati in arrivo da un form in formato JSON
$_POST = json_decode(file_get_contents("php://input"), true);

//echo json_encode($_POST);

$nome = $_POST['name'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];

$sql = "INSERT INTO users (name, gender, email, mobile, address) VALUES 
    ('" . $nome . "', '" . $gender . "', '" . $email . "', '" . $mobile . "', '" . $address . "')";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die('Update query failed :' . mysqli_error($conn));
} else {
    echo "Utente AGGIUNTO con successo";
}

http_response_code(200);
?>