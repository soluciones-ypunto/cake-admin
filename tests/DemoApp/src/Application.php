<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.3.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace DemoApp;

use Cake\Core\Configure;
use Cake\Core\ContainerInterface;
use Cake\Core\Exception\MissingPluginException;
use Cake\Datasource\FactoryLocator;
use Cake\Error\Middleware\ErrorHandlerMiddleware;
use Cake\Http\BaseApplication;
use Cake\Http\Middleware\BodyParserMiddleware;
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Http\MiddlewareQueue;
use Cake\ORM\Locator\TableLocator;
use Cake\Routing\Middleware\AssetMiddleware;
use Cake\Routing\Middleware\RoutingMiddleware;
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

/**
 * Application setup class.
 *
 * This defines the bootstrapping logic and middleware layers you
 * want to use in your application.
 */
class Application extends BaseApplication
{
    /**
     * Load all the application configuration and bootstrap logic.
     *
     * @return void
     */
    public function bootstrap(): void
    {
        // Call parent to load bootstrap from files.
        parent::bootstrap();

        if (PHP_SAPI === 'cli') {
            $this->bootstrapCli();
        } else {
            FactoryLocator::add(
                'Table',
                (new TableLocator())->allowFallbackClass(false)
            );
        }

        /*
         * Only try to load DebugKit in development mode
         * Debug Kit should not be installed on a production system
         */
        if (Configure::read('debug')) {
            Configure::write('DebugKit.forceEnable', true);
            $this->addPlugin('DebugKit');
        }

        // Load more plugins here
        $this->addPlugin(\Ypunto\Admin\Plugin::class);
        $this->addPlugin(\SpanishInflections\Plugin::class);
    }

    public function routes(RouteBuilder $routes): void
    {
        $routes->scope('/', function (RouteBuilder $routes) {
            // Register scoped middleware for in scopes.
            //$routes->registerMiddleware('csrf', new CsrfProtectionMiddleware([
            //    'httponly' => true
            //]));

            /**
             * Apply a middleware to the current route scope.
             * Requires middleware to be registered via `Application::routes()` with `registerMiddleware()`
             */
            //$routes->applyMiddleware('csrf');

            /**
             * Here, we are connecting '/' (base path) to a controller called 'Pages',
             * its action called 'display', and we pass a param to select the view file
             * to use (in this case, src/Template/Pages/home.ctp)...
             */
            $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

            /**
             * ...and connect the rest of 'Pages' controller's URLs.
             */
            $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

            /**
             * Connect catchall routes for all controllers.
             *
             * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
             *
             * ```
             * $routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);
             * $routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);
             * ```
             *
             * Any route class can be used with this method, such as:
             * - DashedRoute
             * - InflectedRoute
             * - Route
             * - Or your own route class
             *
             * You can remove these routes once you've connected the
             * routes you want in your application.
             */
            $routes->fallbacks(DashedRoute::class);
        });
    }

    /**
     * Set up the middleware queue your application will use.
     *
     * @param \Cake\Http\MiddlewareQueue $middlewareQueue The middleware queue to set up.
     * @return \Cake\Http\MiddlewareQueue The updated middleware queue.
     */
    public function middleware(MiddlewareQueue $middlewareQueue): MiddlewareQueue
    {
        $middlewareQueue
            // Catch any exceptions in the lower layers,
            // and make an error page/response
            ->add(new ErrorHandlerMiddleware(Configure::read('Error')))

            // Handle plugin/theme assets like CakePHP normally does.
            ->add(new AssetMiddleware([
                'cacheTime' => Configure::read('Asset.cacheTime'),
            ]))

            // Add routing middleware.
            // If you have a large number of routes connected, turning on routes
            // caching in production could improve performance. For that when
            // creating the middleware instance specify the cache config name by
            // using its second constructor argument:
            // `new RoutingMiddleware($this, '_cake_routes_')`
            ->add(new RoutingMiddleware($this))

            // Parse various types of encoded request bodies so that they are
            // available as array through $request->getData()
            // https://book.cakephp.org/4/en/controllers/middleware.html#body-parser-middleware
            ->add(new BodyParserMiddleware())

            // Cross Site Request Forgery (CSRF) Protection Middleware
            // https://book.cakephp.org/4/en/controllers/middleware.html#cross-site-request-forgery-csrf-middleware
            ->add(new CsrfProtectionMiddleware([
                'httponly' => true,
            ]));

        return $middlewareQueue;
    }

    /**
     * Register application container services.
     *
     * @param \Cake\Core\ContainerInterface $container The Container to update.
     * @return void
     * @link https://book.cakephp.org/4/en/development/dependency-injection.html#dependency-injection
     */
    public function services(ContainerInterface $container): void
    {
    }

    /**
     * Bootstrapping for CLI application.
     *
     * That is when running commands.
     *
     * @return void
     */
    protected function bootstrapCli(): void
    {
        try {
            $this->addPlugin('Bake');
        } catch (MissingPluginException $e) {
            // Do not halt if the plugin is missing
        }

        $this->addPlugin('Migrations');

        // Load more plugins here
    }
}
