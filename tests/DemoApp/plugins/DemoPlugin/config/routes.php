<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin('DemoPlugin', ['path' => '/demo-plugin'], function (RouteBuilder $routes) {

    $routes->prefix('TestPrefix', ['path' => '/test-prefix'], function (RouteBuilder $routes) {
        $routes->fallbacks(DashedRoute::class);
    });

    $routes->fallbacks(DashedRoute::class);
});
