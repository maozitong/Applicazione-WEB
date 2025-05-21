<?php
include_once(CONNECT_DB_PATHFILE);
    $_POST = json_decode(file_get_contents("php://input"), true);
    $id = $_POST['IDImmobile'];
    $sql = "DELETE FROM immobili WHERE IDImmobile = $id";
    mysqli_query($conn, $sql);
    if(!$result){
        die('Delete query failed: '.mysqli_error($conn));
    }else{
        echo "Immobile eliminato con ID = $id eliminato con successo";
    }
    http_response_code(200);
?>