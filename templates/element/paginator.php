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
            'class' => 'form-inline force-form-inline',
            'onsubmit' => sprintf(
                'this.page.value = Math.min(parseInt(this.page.value) || 1, %s)',
                $this->Paginator->param('pageCount')
            ),
        ]) ?>

        <?php foreach ($extraQueryParams as $_key => $value):
            echo $this->Form->hidden($_key, compact('value')) . PHP_EOL;
        endforeach; ?>

        <span class="page-info">
            <?= $this->Paginator->counter('range') ?>

        </span>

        <span class="page-info d-none d-md-block">
            <?= ($this->Paginator instanceof PaginatorHelper) ? $this->Paginator->limitControlAlone() : $this->Paginator->limitControl() ?> <?= __('por pág.') ?>

        </span>

        <span class="page-info d-none d-md-block">
            <?= $this->Form->number('page', [
                'value' => $this->request->getQuery('page', '1'),
                'style' => 'width: 3rem; text-align: center; padding-right: 0.1rem;',
                'onChange' => sprintf(
                    'this.value = Math.min(parseInt(this.value) || 1, %s); this.form.submit()',
                    $this->Paginator->param('pageCount')
                ),
            ]) ?>

            <?= $this->Paginator->counter(['format' => __('de {{pages}}')]) ?>

        </span>
        <?= $this->Form->end() ?>

    </div>

    <ul class="pagination col-auto">
        <?= $this->Paginator->prev('<i class="fas fa-angle-left"></i>', ['escape' => false]) ?>
        <?= $this->Paginator->next('<i class="fas fa-angle-right"></i>', ['escape' => false]) ?>
    </ul>
</nav>
