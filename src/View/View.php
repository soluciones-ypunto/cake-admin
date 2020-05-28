<?php
/**
 * Created by javier
 * Date: 27/5/20
 * Time: 19:55
 */

namespace Ypunto\Admin\View;

use Cake\View\View as CakeView;

/**
 * Class View
 * @package Ypunto\Admin\View
 */
class View extends CakeView
{
    /**
     * Sobreescribimos este método para que pueda usar como elements templates "locales" a la vista que se está
     * renderizando. Es decir, busca el archivo de forma relativa a la carpeta del template actual, y si
     * lo encuentra, utiliza este. Sino funciona como la función tradicional, buscando en los paths correspondientes.
     *
     * {{@inheritdoc}}
     *
     * @param string $name
     * @return false|string
     */
    protected function _getElementFileName($name, $pluginCheck = true)
    {
        $name = str_replace('/', DS, $name);
        if ($name[0] === DS) {
            $name = substr($name, 1);
        }
        $file = dirname($this->_current) . DS . $name . $this->_ext;
        if (file_exists($file)) {
            return $file;
        }

        return parent::_getElementFileName($name);
    }
}