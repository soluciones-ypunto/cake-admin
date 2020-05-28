<?php
/**
 * Created by javier
 * Date: 27/5/20
 * Time: 19:27
 */

namespace Ypunto\Admin\Shell\Task;

/**
 * Class TemplateTask
 * @package Ypunto\Admin\Shell\Task
 */
class TemplateTask extends \Bake\Shell\Task\TemplateTask
{
    /**
     * Get a list of actions that can / should have view templates baked for them.
     *
     * @return array Array of action names that should be baked
     */
    protected function _methodsToBake()
    {
        $methods = parent::_methodsToBake();
        $methods[] = '_form'; // add _form to methods in order to bake the _form template

        return $methods;
    }
}