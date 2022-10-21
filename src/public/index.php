<?php

require __DIR__ . '/../../vendor/autoload.php';

// header('Access-Control-Allow-Origin: *'); 
// header("Access-Control-Allow-Credentials: true");
// header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
// header('Access-Control-Max-Age: 1000');
// header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

// header('Content-Type: Application/json; charset=UTF-8');

// ini_set('display_errors', TRUE);
// ini_set('error_reporting', E_ALL|E_CORE_WARNING);
    

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once( __DIR__ . '/index.html');
    }

// }

// // se a página não existir
// // então emita  o erro de requisição inválida.
// http_response_code(400); // 400 Bad Request
// echo 'Invalid Request';

?>