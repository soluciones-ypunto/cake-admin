<?php

namespace Ypunto\Admin;

use Cake\Core\BasePlugin;
use Cake\Core\Configure;
use Cake\Core\PluginApplicationInterface;
use Ypunto\Admin\Bake\TemplateRenderFilter;

/**
 * Plugin for Ypunto\Admin
 */
class Plugin extends BasePlugin
{

    /**
     * {@inheritdoc}
     */
    public function bootstrap(PluginApplicationInterface $app)
    {
        /**
         * Agregamos los templates del plugin a los paths de búsqueda
         */
        $paths = Configure::read('App.paths.templates');
        array_push($paths, $this->getPath() . 'src' . DS . 'Template' . DS);
        Configure::write('App.paths.templates', $paths);
        unset($paths);

        if (PHP_SAPI === 'cli') {
            /**
             * Habilitamos los filtros para bake sólo en caso de estar ejecutando desde la consola
             */
            $app->getEventManager()->on(new TemplateRenderFilter());
        }
    }
}
