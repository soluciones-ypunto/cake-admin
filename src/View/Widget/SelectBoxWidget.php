<?php
/**
 * Created by javier
 * Date: 25/1/21
 * Time: 20:56
 */

namespace Ypunto\Admin\View\Widget;

use BootstrapUI\View\Widget\InputgroupTrait;
use Cake\View\Form\ContextInterface;

class SelectBoxWidget extends \Cake\View\Widget\SelectBoxWidget
{
    use InputgroupTrait;

    /**
     * @param array            $data
     * @param ContextInterface $context
     *
     * @return string
     */
    public function render(array $data, ContextInterface $context): string
    {
        $_data = $this->injectClasses(['form-select'], $data);

        return $this->_withInputGroup($_data + ['injectFormControl' => false], $context);
    }
}