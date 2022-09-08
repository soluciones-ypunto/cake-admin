<?php

namespace Ypunto\Admin;

use Cake\Core\BasePlugin;
use Cake\Core\Configure;
use Cake\Core\PluginApplicationInterface;
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;
use Ypunto\Admin\Bake\TemplateRenderFilter;

/**
 * Plugin for Ypunto\Admin
 */
class Plugin extends BasePlugin
{
    /**
     * {@inheritdoc}
     */
    public function bootstrap(PluginApplicationInterface $app): void
    {
        /**
         * Agregamos los templates del plugin a los paths de búsqueda
         */
        $paths = Configure::read('App.paths.templates');
        $paths[] = $this->getPath().'templates'.DS;
        Configure::write('App.paths.templates', $paths);
        unset($paths);

        if (PHP_SAPI === 'cli') {
            /**
             * Habilitamos los filtros para bake sólo en caso de estar ejecutando desde la consola
             */
            $app->getEventManager()->on(new TemplateRenderFilter());
        }
    }

    /**
     * {@inheritdoc}
     */
    public function routes(RouteBuilder $routes): void
    {
        $routes->plugin('Ypunto/Admin', ['path' => '/ypunto-admin'], function (RouteBuilder $routes) {
            $routes->fallbacks(DashedRoute::class);
        });
    }
}
