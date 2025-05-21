<?php
header("Access-Control-Allow-Origin: *"); //rende accessibile le pagine PHP a qualsiasi dominio
header("Content-Type: application/json; charset=UTF-8"); //restituisce un contenuto di tipo JSON, codificato in UTF-8
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE"); //rendono accessibile i metodi HTTP elencati
header("Access-Control-Max-Age: 3600"); //tempo di refresh (tempo di durata della cache)
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Definizione delle costanti per il progetto
define('PROJECT_NAME', '5B_php_crud');
define('CONNECT_DB_PATHFILE', __DIR__ . '/config/connect.php');


// Gestione delle rotte
$request = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];


switch ($request) {
    case '/' . PROJECT_NAME . '/index.php/users':
        if ($method == 'GET') {
            require __DIR__ . '/api/users/read.php';
        } elseif ($method == 'PUT') {
            require __DIR__ . '/api/users/update.php';
        } elseif ($method == 'POST') {
            require __DIR__ . '/api/users/create.php';
        } elseif ($method == 'DELETE') {
            require __DIR__ . '/api/users/delete.php';
        }
        break;
    // case preg_match('/\/users\/(\d+)/', $request, $matches) ? $request : !$request:
    //     if ($method == 'GET') {
    //         $id = $matches[1];
    //         require __DIR__ . '/api/users/read.php';
    //     } elseif ($method == 'PUT') {
    //         $id = $matches[1];
    //         require __DIR__ . '/api/users/update.php';
    //     } elseif ($method == 'DELETE') {
    //         $id = $matches[1];
    //         require __DIR__ . '/api/users/delete.php';
    //     }
    //     break;
    default:
        echo "Pagina iniziale";
        http_response_code(404);
        echo json_encode(["message" => "Risorsa non trovata"]);
        break;
}
?>