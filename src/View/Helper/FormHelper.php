<?php /** @noinspection HtmlUnknownAttribute */

/**
 * Created by javier
 * Date: 25/1/21
 * Time: 20:48
 */

namespace Ypunto\Admin\View\Helper;

/**
 * Class FormHelper
 * @package Ypunto\Admin\View\Helper
 */
class FormHelper extends \BootstrapUI\View\Helper\FormHelper
{
    /**
     * Default Bootstrap string templates.
     *
     * @var array
     */
    protected $_templates = [
        'error' => '<div class="invalid-feedback">{{content}}</div>',
        'errorTooltip' => '<div class="invalid-tooltip">{{content}}</div>',
        'label' => '<label{{attrs}}>{{text}}{{tooltip}}</label>',
        'help' => '<small{{attrs}} class="form-text text-muted">{{content}}</small>',
        'tooltip' => '<span data-toggle="tooltip" title="{{content}}" class="fas fa-info-circle"></span>',
        'datetimeContainer' => '<div class="form-group {{type}}{{required}}" role="group" ' .
            'aria-labelledby="{{groupId}}">{{content}}{{help}}</div>',
        'datetimeContainerError' =>
            '<div class="form-group {{formGroupPosition}}{{type}}{{required}} is-invalid" ' .
            'role="group" aria-labelledby="{{groupId}}">{{content}}{{error}}{{help}}</div>',
        'datetimeLabel' => '<label id="{{groupId}}">{{text}}{{tooltip}}</label>',
        'inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}{{help}}</div>',
        'inputContainerError' =>
            '<div class="form-group {{formGroupPosition}}{{type}}{{required}} is-invalid">' .
            '{{content}}{{error}}{{help}}</div>',
        'checkboxContainer' => '<div class="form-group form-check {{type}}{{required}}">{{content}}{{help}}</div>',
        'checkboxContainerError' =>
            '<div class="form-group form-check {{formGroupPosition}}{{type}}{{required}} is-invalid">' .
            '{{content}}{{error}}{{help}}</div>',
        'customCheckboxContainer' => '<div class="form-group custom-control custom-checkbox ' .
            '{{type}}{{required}}">{{content}}{{help}}</div>',
        'customCheckboxContainerError' =>
            '<div class="form-group custom-control custom-checkbox ' .
            '{{formGroupPosition}}{{type}}{{required}} is-invalid">{{content}}{{error}}{{help}}</div>',
        'checkboxInlineContainer' => '<div class="form-check form-check-inline {{type}}{{required}}">' .
            '{{content}}</div>',
        'checkboxInlineContainerError' => '<div class="form-check form-check-inline {{type}}{{required}} ' .
            'is-invalid">{{content}}</div>',
        'customCheckboxInlineContainer' => '<div class="form-group custom-control custom-checkbox ' .
            'custom-control-inline {{type}}{{required}}">{{content}}</div>',
        'customCheckboxInlineContainerError' =>
            '<div class="form-group custom-control custom-checkbox custom-control-inline ' .
            '{{formGroupPosition}}{{type}}{{required}} is-invalid">{{content}}</div>',
        'checkboxFormGroup' => '{{input}}{{label}}',
        'checkboxWrapper' => '<div class="form-check">{{label}}</div>',
        'checkboxInlineWrapper' => '<div class="form-check form-check-inline">{{label}}</div>',
        'customCheckboxWrapper' => '<div class="custom-control custom-checkbox">{{label}}</div>',
        'customCheckboxInlineWrapper' => '<div class="custom-control custom-checkbox custom-control-inline">' .
            '{{label}}</div>',
        'radioContainer' => '<div class="form-group {{type}}{{required}}" role="group" ' .
            'aria-labelledby="{{groupId}}">{{content}}{{help}}</div>',
        'radioContainerError' =>
            '<div class="form-group {{formGroupPosition}}{{type}}{{required}} is-invalid" role="group" ' .
            'aria-labelledby="{{groupId}}">{{content}}{{error}}{{help}}</div>',
        'radioLabel' => '<label id="{{groupId}}" class="d-block">{{text}}{{tooltip}}</label>',
        'radioWrapper' => '<div class="form-check">{{hidden}}{{label}}</div>',
        'radioInlineWrapper' => '<div class="form-check form-check-inline">{{label}}</div>',
        'customRadioWrapper' => '<div class="custom-control custom-radio">{{hidden}}{{label}}</div>',
        'customRadioInlineWrapper' => '<div class="custom-control custom-radio custom-control-inline">' .
            '{{hidden}}{{label}}</div>',
        'staticControl' => '<p class="form-control-plaintext">{{content}}</p>',
        'inputGroupAddon' => '<div class="{{class}}">{{content}}</div>',
        'inputGroupContainer' => '<div{{attrs}}>{{prepend}}{{content}}{{append}}</div>',
        'inputGroupText' => '<span class="input-group-text">{{content}}</span>',
        'multicheckboxContainer' => '<div class="form-group {{type}}{{required}}" role="group" ' .
            'aria-labelledby="{{groupId}}">{{content}}{{help}}</div>',
        'multicheckboxContainerError' =>
            '<div class="form-group {{formGroupPosition}}{{type}}{{required}} is-invalid" role="group" ' .
            'aria-labelledby="{{groupId}}">{{content}}{{error}}{{help}}</div>',
        'multicheckboxLabel' => '<label id="{{groupId}}" class="d-block">{{text}}{{tooltip}}</label>',
        'multicheckboxWrapper' => '<fieldset class="form-group">{{content}}</fieldset>',
        'multicheckboxTitle' => '<legend class="col-form-label pt-0">{{text}}</legend>',
        'customFileLabel' => '<label class="custom-file-label"{{attrs}}>{{text}}{{tooltip}}</label>',
        'customFileFormGroup' => '<div class="custom-file {{invalid}}">{{input}}{{label}}</div>',
        'customFileInputGroupFormGroup' => '{{input}}',
        'customFileInputGroupContainer' =>
            '<div{{attrs}}>{{prepend}}<div class="custom-file {{invalid}}">{{content}}{{label}}</div>{{append}}</div>',
        'nestingLabel' => '{{hidden}}{{input}}<label{{attrs}}>{{text}}{{tooltip}}</label>',
        'nestingLabelNestedInput' => '{{hidden}}<label{{attrs}}>{{input}}{{text}}{{tooltip}}</label>',
    ];

    /**
     * Default Bootstrap widgets.
     *
     * @var array
     */
    protected $_widgets = [
        'button' => 'BootstrapUI\View\Widget\ButtonWidget',
        'datetime' => 'BootstrapUI\View\Widget\DateTimeWidget',
        'file' => ['BootstrapUI\View\Widget\FileWidget', 'label'],
        'select' => 'Ypunto\Admin\View\Widget\SelectBoxWidget',
        'textarea' => 'BootstrapUI\View\Widget\TextareaWidget',
        '_default' => 'BootstrapUI\View\Widget\BasicWidget',
    ];
}