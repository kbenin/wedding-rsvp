<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routes = [
    '/' => 'controllers/index.php',
    '/invitation' => 'controllers/invitation.php',
    '/entourage' => 'controllers/entourage.php',
    '/gallery' => 'controllers/gallery.php',
    '/venue' => 'controllers/venue.php',
    '/ceremony-and-reception' => 'controllers/ceremony-and-reception.php',
    '/rsvp' => 'controllers/rsvp.php',
    '/thank-you' => 'controllers/thank-you.php',
];

function routeToController($uri, $routes) {
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

function abort($code = 404) {
    http_response_code($code);

    require "views/{$code}.view.php";
    
    die();
}

routeToController($uri, $routes);