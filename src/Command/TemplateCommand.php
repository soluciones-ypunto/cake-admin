<?php
/**
 * Created by javier
 * Date: 21/1/21
 * Time: 23:15
 */

namespace Ypunto\Admin\Command;

use \Bake\Command\TemplateCommand as BakeTemplateCommand;

class TemplateCommand extends BakeTemplateCommand
{
    /**
     * Get a list of actions that can / should have view templates baked for them.
     *
     * @return array Array of action names that should be baked
     */
    protected function _methodsToBake(): array
    {
        $methods = parent::_methodsToBake();
        $methods[] = '_form'; // add _form to methods in order to bake the _form template

        return $methods;
    }
}