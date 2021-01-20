<?php
/**
 * Created by javier
 * Date: 03/12/18
 * Time: 12:59
 */

namespace Ypunto\Admin\View\Helper;

class PaginatorHelper extends \Cake\View\Helper\PaginatorHelper
{
    /**
     * Default config for this class
     *
     * Options: Holds the default options for pagination links
     *
     * The values that may be specified are:
     *
     * - `url` Url of the action. See Router::url()
     * - `url['sort']` the key that the recordset is sorted.
     * - `url['direction']` Direction of the sorting (default: 'asc').
     * - `url['page']` Page number to use in links.
     * - `model` The name of the model.
     * - `escape` Defines if the title field for the link should be escaped (default: true).
     *
     * Templates: the templates used by this class
     *
     * @var array
     */
    protected $_defaultConfig = [
        'options' => [
            'limitOptions' => [
                '10' => '10',
                '20' => '20',
                '50' => '50',
                '100' => '100',
            ],
        ],
        'templates' => [
            'nextActive' => '<li class="page-item next"><a class="page-link" rel="next" href="{{url}}">{{text}}</a></li>',
            'nextDisabled' => '<li class="page-item next disabled"><a class="page-link" href="" onclick="return false;" tabindex="-1">{{text}}</a></li>',
            'prevActive' => '<li class="page-item prev"><a class="page-link" rel="prev" href="{{url}}">{{text}}</a></li>',
            'prevDisabled' => '<li class="page-item prev disabled"><a class="page-link" href="" onclick="return false;" tabindex="-1">{{text}}</a></li>',
            'counterRange' => '{{start}} - {{end}} de {{count}}',
            'counterPages' => '{{page}} de {{pages}}',
            'first' => '<li class="page-item first"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'last' => '<li class="page-item last"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'current' => '<li class="page-item active"><a class="page-link" href="">{{text}}</a></li>',
            'ellipsis' => '<li class="page-item ellipsis disabled"><span class="page-link">&hellip;</span></li>',
            'sort' => '<a class="sort-link" href="{{url}}">{{text}}</a>',
            'sortAsc' => '<a class="sort-link asc" href="{{url}}">{{text}}</a>',
            'sortDesc' => '<a class="sort-link desc" href="{{url}}">{{text}}</a>',
            'sortAscLocked' => '<a class="sort-link asc locked" href="{{url}}">{{text}}</a>',
            'sortDescLocked' => '<a class="sort-link desc locked" href="{{url}}">{{text}}</a>',
        ]
    ];

    /**
     * @param array $config
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        if (!empty($config['options']['limitOptions'])) {
            // prevent merging limitOptions array
            $this->_configWrite('options.limitOptions', $config['options']['limitOptions'], false);
        }
    }

    /**
     * @param array $limits
     * @param null  $default
     * @param array $options
     *
     * @return string
     */
    public function limitControlAlone(array $limits = [], $default = null, array $options = [])
    {
        if (empty($default) || !is_numeric($default)) {
            $default = $this->param('perPage');
        }

        if (empty($limits)) {
            $limits = $this->getConfig('options.limitOptions');
        }

        return $this->Form->select('limit', $limits, $options + [
            'value' => $default,
            'onChange' => 'this.form.page.value = 1; this.form.submit()'
        ]);
    }
}