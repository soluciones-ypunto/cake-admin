<?php
/**
 * @var \App\View\AppView $this
 * @var \Ypunto\Admin\Model\Entity\Etiqueta[]|\Cake\Collection\CollectionInterface $etiquetas
 */
?>

<div class="etiquetas index">
    <h1 class="ypunto-title"><?= __('Etiquetas') ?></h1>

    <div class="card">
        <div class="sticky-navbar-top bg-white p-0">
            <div class="d-flex p-2 justify-content-between">
                <a href="<?= $this->Url->build(['action' => 'add']) ?>" class="btn btn-light-alt">
                    <i class="fas fa-fw fa-plus"></i> <span class="d-none d-md-inline"><?= __('Crear Etiqueta') ?></span>
                </a>

                <?= $this->element('Ypunto/Admin.paginator') ?>

            </div>
            <div class="row ypunto-table-headers">
                <div class="col col-id"><?= $this->Paginator->sort('id') ?></div>
                <div class="col col-display-field"><?= $this->Paginator->sort('nombre') ?></div>
                <div class="col-2 d-none d-lg-block"><?= $this->Paginator->sort('modified') ?></div>
            </div>
        </div>

        <?php foreach ($etiquetas as $etiqueta): ?>
        <div class="ypunto-list-item">
            <div class="col col-id"><?= $this->Number->format($etiqueta->id) ?></div>
            <div class="col col-display-field">
                <a class="main-action" href="<?= $this->Url->build(['action' => 'view', $etiqueta->id]) ?>">
                    <span class="display-field"><?= h($etiqueta->nombre) ?></span>
                    <span class="drop-field"><?= h($etiqueta->created) ?></span>
                </a>

                <div class="actions dropdown">
                    <button class="btn btn-sm btn-outline-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" data-boundary="window">
                        <?= $this->Html->link(__('{icon} Ver', ['icon' => '<i class="far fa-fw fa-eye"></i>']), ['action' => 'view', $etiqueta->id], ['class' => 'dropdown-item', 'escape' => false]) ?>
                        <?= $this->Html->link(__('{icon} Editar', ['icon' => '<i class="fas fa-fw fa-pencil-alt"></i>']), ['action' => 'edit', $etiqueta->id], ['class' => 'dropdown-item', 'escape' => false]) ?>
                        <div class="dropdown-divider"></div>
                        <?= $this->Form->postLink(__('{icon} Eliminar', ['icon' => '<i class="fas fa-fw fa-trash"></i>']), ['action' => 'delete', $etiqueta->id], ['confirm' => __('Eliminar este registro?', $etiqueta->id), 'class' => 'dropdown-item text-danger', 'escape' => false]) ?>
                    </div>
                </div>
            </div>
            <div class="col-2 d-none d-lg-block"><?= h($etiqueta->modified) ?></div>
        </div>
        <?php endforeach; ?>

    </div>
</div>

<?php $this->append('ypunto-quick-actions') ?>
    <a class="dropdown-item" href="<?= $this->Url->build(['action' => 'add']) ?>"><?= __('Crear Etiqueta') ?></a>
    <div class="dropdown-divider"></div>

    <h6 class="dropdown-header"><?= __('Entidades') ?></h6>
    <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'Entidades', 'action' => 'index']) ?>"><?= __('Listado de Entidades') ?></a>
    <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'Entidades', 'action' => 'add']) ?>"><?= __('Crear Entidad') ?></a>

<?php $this->end() ?>
