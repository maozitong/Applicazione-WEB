<?php
include_once(CONNECT_DB_PATHFILE);

$users = array();
$sql = 'SELECT * FROM `immobili`';
$result = mysqli_query($conn, $sql);

if (!$result) {
    die('Query failed :' . mysqli_error($conn));
} else {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($users, $row);
    }
}

http_response_code(200);
echo json_encode($users);
?>