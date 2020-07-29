<?php
/**
 * Soluciones yPunto. Html5 powered solutions.
 * CakePHP Responsive Template Admin made with Bootstrap 4.
 *
 * @link https://github.com/soluciones-ypunto/cake-admin
 * @copyright Copyright (c) Soluciones yPunto SAS (https://solucionesypunto.com).
 *
 * @var \DemoApp\View\AppView $this
 * @var \Cake\ORM\Entity[]&\Cake\Datasource\ResultSetInterface $entidades
 */
?>

<div class="entidades index">
    <header class="ypunto-content-header">
        <h1 class="ypunto-title"><?= __('Entidades') ?></h1>

        <div class="btn-toolbar actions-toolbar" role="toolbar" aria-label="<?= __('Acciones') ?>">
            <div class="btn-group actions-shared">
                <?= $this->Html->link(
                    sprintf('<i class="fas fa-fw fa-plus"></i> <span class="d-none d-sm-inline">%s</span>', __('Crear Entidad')),
                    ['action' => 'add'],
                    ['class' => 'btn btn-sm btn-light-alt btn-responsive', 'escape' => false]
                ) ?>

            </div>
        </div>
    </header>

    <div class="card">
        <div class="sticky-navbar-top bg-white p-0">
            <div class="d-flex flex-column flex-md-row p-2 justify-content-between">
                <div class="search-form mb-2">
                    <?= $this->Form->create() ?>

                    <div class="input-group mr-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search fa-fw"></i></span>
                        </div>
                        <?= $this->Form->search('search', ['placeholder' => __('Buscar Entidades')]) ?>

                    </div>
                    <?= $this->Form->end() ?>

                </div>
                <div class="ml-auto">
                    <?= $this->element('Ypunto/Admin.paginator') ?>

                </div>
            </div>
            <div class="ypunto-table-headers">
                <div class="col col-id text-right"><?= $this->Paginator->sort('id', __('# Id.')) ?></div>
                <div class="col col-display-field"><?= $this->Paginator->sort('id') ?></div>
                <div class="col-2 d-none d-lg-block"><?= $this->Paginator->sort('nombre') ?></div>
                <div class="col-2 d-none d-lg-block"><?= $this->Paginator->sort('email') ?></div>
            </div>
        </div>

        <?php foreach ($entidades as $entidad): ?>
        <div class="ypunto-list-item">
            <div class="col col-id"><?= $this->Number->format($entidad->id) ?></div>
            <div class="col col-display-field">
                <a class="main-action" href="<?= $this->Url->build(['action' => 'view', $entidad->id]) ?>">
                    <span class="display-field"><?= h($entidad->id) ?></span>
                    <span class="drop-field"><?= h($entidad->grupo_id) ?></span>
                </a>

                <div class="actions dropdown">
                    <button class="btn btn-sm btn-outline-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" data-boundary="window">
                        <?= $this->Html->link(__('{icon} Ver', ['icon' => '<i class="far fa-fw fa-eye"></i>']), ['action' => 'view', $entidad->id], ['class' => 'dropdown-item', 'escape' => false]) ?>
                        <?= $this->Html->link(__('{icon} Editar', ['icon' => '<i class="fas fa-fw fa-pencil-alt"></i>']), ['action' => 'edit', $entidad->id], ['class' => 'dropdown-item', 'escape' => false]) ?>
                        <div class="dropdown-divider"></div>
                        <?= $this->Form->postLink(__('{icon} Eliminar', ['icon' => '<i class="fas fa-fw fa-trash"></i>']), ['action' => 'delete', $entidad->id], ['confirm' => __('Eliminar este registro?', $entidad->id), 'class' => 'dropdown-item text-danger', 'escape' => false]) ?>
                    </div>
                </div>
            </div>
            <div class="col-2 d-none d-lg-block"><?= h($entidad->nombre) ?></div>
            <div class="col-2 d-none d-lg-block"><?= h($entidad->email) ?></div>
        </div>
        <?php endforeach; ?>

    </div>
</div>

<?php $this->append('ypunto-quick-actions') ?>
    <a class="dropdown-item" href="<?= $this->Url->build(['action' => 'add']) ?>"><?= __('Crear Entidad') ?></a>
    <div class="dropdown-divider"></div>

<?php $this->end() ?>
