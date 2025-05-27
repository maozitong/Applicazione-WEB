<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

define('PROJECT_NAME', 'Applicazione-WEB-main'); // usa il nome corretto della tua cartella, minuscolo

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

switch (true) {
    case $request === '/' . PROJECT_NAME . '/index.php/immobili':
        if ($method === 'GET') {
            require __DIR__ . '/api/immobili/read.php';
        } elseif ($method === 'PUT') {
            require DIR . '/api/immobili/update.php';
        } elseif ($method === 'POST') {
            require DIR . '/api/immobili/create.php';
        } elseif ($method === 'DELETE') {
            require DIR . '/api/immobili/delete.php';
        } else {
            http_response_code(405);
            echo json_encode(["message" => "Metodo HTTP non consentito"]);
        }
        break;

    default:
        http_response_code(404);
        echo json_encode(["message" => "Risorsa non trovata"]);
        break;
}
?>