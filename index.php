<?php

@include('vendor/autoload.php');

// Stap 1 - Routes binnenhalen
$routes = @include('app/Routes/routes.php');

// Stap 2 - De request doorsturen naar de RequestHandler
$requestHandler = new \App\Http\RequestHandler($routes);

$requestHandler->handleRequest();
