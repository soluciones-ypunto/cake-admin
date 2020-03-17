<?php
/**
 * Created by javier
 * Date: 16/3/20
 * Time: 20:35
 */

namespace Ypunto\Admin\Controller\Utility;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Trait PrgTrait
 * @package Ypunto\Admin\Controller\Utility
 */
trait PrgTrait
{

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface      $response
     *
     * @return ResponseInterface|null
     */
    protected function applyPrg(ServerRequestInterface &$request, ResponseInterface $response)
    {
        if ($request->getMethod() === 'POST') {
            [$uri, ] = explode('?', $request->getRequestTarget());
            $params = array_filter($request->getParsedBody()) +
                array_intersect_key($request->getQueryParams(), ['limit' => true, 'sort' => true]);

            if (!empty($params)) {
                $uri = sprintf("%s?%s", $uri, http_build_query($params));
            }

            return $response
                ->withHeader('location', $uri)
                ->withStatus(302);
        } else {
            $request = $request->withParsedBody($request->getQueryParams());

            return null;
        }
    }
}