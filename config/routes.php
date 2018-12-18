<?php

use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin('Ypunto/Admin', ['path' => '/admin-ypunto'], function (RouteBuilder $routes) {
    $routes->fallbacks(DashedRoute::class);
});
