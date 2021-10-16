<?php
/**
 * Created by javier
 * Date: 13/07/18
 * Time: 09:01
 */
/**
 * @var \App\View\AppView $this
 */

use \Ypunto\Admin\View\Helper\PaginatorHelper;

/**
 * GET forms will override params existing in query string, so we have to add them as hidden inputs
 * we keep everything but page and limit because there is an input for both of them
 *
 * @see https://stackoverflow.com/questions/1116019/submitting-a-get-form-with-query-string-params-and-hidden-params-disappear
 */
$extraQueryParams = array_diff_key($this->request->getQueryParams(), ['page' => 1, 'limit' => 1]);
?>
<nav class="paginator row align-items-baseline" aria-label="<?= __('Paginación') ?>">
    <div class="pagination-form col-auto">
        <?= $this->Form->create(null, [
            'type' => 'get',
            'class' => 'form-inline row row-cols-auto gx-3 align-items-baseline',
            'onsubmit' => sprintf(
                'this.page.value = Math.min(parseInt(this.page.value) || 1, %s)',
                $this->Paginator->param('pageCount')
            ),
        ]) ?>

        <?= $this->Form->hiddenFields($extraQueryParams) . PHP_EOL ?>

        <span class="page-info">
            <?= $this->Paginator->counter('range') ?>

        </span>

        <span class="page-info d-none d-md-block text-nowrap">
            <?= ($this->Paginator instanceof PaginatorHelper) ?
                $this->Paginator->limitControlAlone([], null, ['class' => 'd-inline-block w-auto']) :
                $this->Paginator->limitControl([], null, ['class' => 'd-inline-block w-auto']) ?>

            <?= __('por pág.') ?>

        </span>

        <span class="page-info d-none d-md-block text-nowrap">
            <?= $this->Form->number('page', [
                'value' => $this->request->getQuery('page', '1'),
                'style' => 'width: 3rem; text-align: center; padding-right: 0.1rem;',
                'onChange' => sprintf(
                    'this.value = Math.min(parseInt(this.value) || 1, %s); this.form.submit()',
                    $this->Paginator->param('pageCount')
                ),
                'class' => 'd-inline-block'
            ]) ?>

            <?= $this->Paginator->counter(__('de {{pages}}')) ?>

        </span>
        <?= $this->Form->end() ?>

    </div>

    <ul class="pagination col-auto">
        <?= $this->Paginator->prev('<i class="fas fa-angle-left"></i>', ['escape' => false]) ?>
        <?= $this->Paginator->next('<i class="fas fa-angle-right"></i>', ['escape' => false]) ?>
    </ul>
</nav>
