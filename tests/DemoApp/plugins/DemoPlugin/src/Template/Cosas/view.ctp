<?php
/**
 * Soluciones yPunto. Html5 powered solutions.
 * CakePHP Responsive Template Admin made with Bootstrap 4.
 *
 * @link https://github.com/soluciones-ypunto/cake-admin
 * @copyright Copyright (c) Soluciones yPunto SAS (https://solucionesypunto.com).
 *
 * @var \DemoApp\View\AppView $this
 * @var \Cake\ORM\Entity $cosa
 */
?>

<div class="ypunto-content cosas view">
    <header class="ypunto-content-header">
        <h1 class="ypunto-title"><?= h($cosa->id) ?></h1>

        <div class="btn-toolbar actions-toolbar" role="toolbar" aria-label="<?= __('Acciones') ?>">
            <div class="btn-group actions-shared">
                <?= $this->Html->link(
                    sprintf('<i class="fas fa-fw fa-list"></i> <span class="d-none d-sm-inline">%s</span>', __('Listado')),
                    ['action' => 'index'],
                    ['class' => 'btn btn-sm btn-light-alt btn-responsive', 'escape' => false]
                ) ?>

                <?= $this->Html->link(
                    sprintf('<i class="fas fa-fw fa-plus"></i> <span class="d-none d-sm-inline">%s</span>', __('Crear Cosa')),
                    ['action' => 'add'],
                    ['class' => 'btn btn-sm btn-light-alt btn-responsive', 'escape' => false]
                ) ?>

            </div>
            <div class="btn-group actions-entity ml-4">
                <?= $this->Html->link(
                    sprintf('<i class="fas fa-fw fa-pencil-alt"></i> <span class="d-none d-sm-inline">%s</span>', __('Editar')),
                    ['action' => 'edit', $cosa->id],
                    ['class' => 'btn btn-sm btn-light-alt btn-responsive', 'escape' => false]
                ) ?>

                <?= $this->Form->postLink(
                    sprintf('<i class="fas fa-fw fa-trash"></i> <span class="d-none d-sm-inline">%s</span>', __('Eliminar')),
                    ['action' => 'delete', $cosa->id],
                    ['confirm' => __('Eliminar este registro?'), 'class' => 'btn btn-sm btn-light-alt btn-responsive text-danger', 'escape' => false]
                ) ?>

            </div>
        </div>
    </header>

    <div class="ypunto-view">
        <section class="ypunto-view-main">
            <div class="card ypunto-view-info">
                <div class="card-body strings">
                    <div class="row row-data">
                        <div class="col-xl-3 key"><?= __('Nombre') ?></div>
                        <div class="col val"><?= h($cosa->nombre) ?></div>
                    </div>
                </div>
                <div class="card-body border-top numbers">
                    <div class="row row-data">
                        <div class="col-xl-3 key"><?= __('Entidad Id') ?></div>
                        <div class="col val"><?= $this->Number->format($cosa->entidad_id) ?></div>
                    </div>
                    <div class="row row-data">
                        <div class="col-xl-3 key"><?= __('Precio') ?></div>
                        <div class="col val"><?= $this->Number->format($cosa->precio) ?></div>
                    </div>
                    <div class="row row-data">
                        <div class="col-xl-3 key"><?= __('Cantidad') ?></div>
                        <div class="col val"><?= $this->Number->format($cosa->cantidad) ?></div>
                    </div>
                </div>
                <div class="card-body border-top texts">
                    <div class="row row-data">
                        <div class="col-xl-3 key"><?= __('Descripcion') ?></div>
                        <div class="col val"><?= $this->Text->autoParagraph(h($cosa->descripcion)); ?></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="ypunto-view-aside">
            <div class="card ypunto-actions-card">
                <?= $this->element('Entity/info', ['entity' => $cosa]) ?>

            </div>
        </section>
    </div>

</div>

<?php $this->append('ypunto-quick-actions') ?>
    <a class="dropdown-item" href="<?= $this->Url->build(['action' => 'add']) ?>"><?= __('Crear Cosa') ?></a>
    <a class="dropdown-item" href="<?= $this->Url->build(['action' => 'index']) ?>"><?= __('Listado de Cosas') ?></a>

<?php $this->end() ?>
