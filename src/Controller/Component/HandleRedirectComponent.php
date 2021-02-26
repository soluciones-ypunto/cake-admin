<?php
/**
 * Created by javier
 * Date: 27/5/20
 * Time: 21:07
 */

namespace Ypunto\Admin\Controller\Component;

use Cake\Controller\Component;
use Cake\Event\EventInterface;
use Cake\Http\Response;
use Cake\Http\ServerRequest;
use Cake\Routing\Router;
use Laminas\Diactoros\Uri;
use Laminas\Diactoros\UriFactory;
use Psr\Http\Message\UriInterface;

/**
 * Class HandleRedirectComponent
 * @package Ypunto\Admin\Controller\Component
 */
class HandleRedirectComponent extends Component
{
    /**
     * @param EventInterface            $event
     * @param string|array|UriInterface $url
     * @param Response                  $response
     */
    public function beforeRedirect(EventInterface $event, $url, Response $response)
    {
        if (is_array($url)) {
            $url = Router::url($url);
        }

        if (is_string($url)) {
            $url = new Uri($url);
        }

        $destination = new ServerRequest(['uri' => $url]);
        $redirect = $this->getController()->getRequest()->getQuery('_redirect');

        /**
         * @todo esto no lo pensé del todo, pero la cosa sería que si la url a la que redirijo tiene también un redirect
         *       es porque después de hacer eso hay un paso siguiente, entonces ignoro el redirect actual
         *       sino no se permitiría "encadenar" redirects o redirigir a la misma url que tiene el redirect.
         *       No sé, pero así permite que demos de alta varias entidades relacionadas seguidas (usando la
         *       función guardar y crear otra), asociadas a una misma entidad padre, cuando se da de alta la última,
         *       se vuelve a donde al view del entity.
         */
        if ($redirect && !$destination->getQuery('_redirect')) {
            $event->setResult($response->withLocation(Router::url($redirect, true)));
        }
    }
}