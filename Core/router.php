<?php

$routes = require base_path('routes.php');


// die();
// dd($uri);



function routeToController($uri, $routes) {
    if (array_key_exists($uri, $routes)) {
        require base_path($routes[$uri]);
    } else {
        abort();
    }
}

// if(array_key_exists($uri, $routes)) {
//     require $routes[$uri];
// }

function abort($code = 404) {
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}
// echo $_SERVER['REQUEST_URI'];
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
routeToController($uri, $routes);