<?php
/**
 * Created by javier
 * Date: 13/07/18
 * Time: 09:01
 */
/**
 * @var \App\View\AppView $this
 */
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

        <span class="page-info">
            <?= $this->Paginator->counter('range') ?>

        </span>

        <span class="page-info d-none d-md-block">
            <?= $this->Paginator->limitControlAlone() ?> por pág.
        </span>

        <span class="page-info d-none d-md-block">
            <?= $this->Form->text('page', [
                'value' => $this->request->getQuery('page', '1'),
                'style' => 'width: 3rem; text-align: right;',
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
