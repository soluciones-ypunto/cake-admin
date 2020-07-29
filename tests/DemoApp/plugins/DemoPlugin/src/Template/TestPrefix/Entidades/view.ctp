<?php
/**
 * Soluciones yPunto. Html5 powered solutions.
 * CakePHP Responsive Template Admin made with Bootstrap 4.
 *
 * @link https://github.com/soluciones-ypunto/cake-admin
 * @copyright Copyright (c) Soluciones yPunto SAS (https://solucionesypunto.com).
 *
 * @var \DemoApp\View\AppView $this
 * @var \Cake\ORM\Entity $entidad
 */
?>

<div class="ypunto-content entidades view">
    <header class="ypunto-content-header">
        <h1 class="ypunto-title"><?= h($entidad->id) ?></h1>

        <div class="btn-toolbar actions-toolbar" role="toolbar" aria-label="<?= __('Acciones') ?>">
            <div class="btn-group actions-shared">
                <?= $this->Html->link(
                    sprintf('<i class="fas fa-fw fa-list"></i> <span class="d-none d-sm-inline">%s</span>', __('Listado')),
                    ['action' => 'index'],
                    ['class' => 'btn btn-sm btn-light-alt btn-responsive', 'escape' => false]
                ) ?>

                <?= $this->Html->link(
                    sprintf('<i class="fas fa-fw fa-plus"></i> <span class="d-none d-sm-inline">%s</span>', __('Crear Entidad')),
                    ['action' => 'add'],
                    ['class' => 'btn btn-sm btn-light-alt btn-responsive', 'escape' => false]
                ) ?>

            </div>
            <div class="btn-group actions-entity ml-4">
                <?= $this->Html->link(
                    sprintf('<i class="fas fa-fw fa-pencil-alt"></i> <span class="d-none d-sm-inline">%s</span>', __('Editar')),
                    ['action' => 'edit', $entidad->id],
                    ['class' => 'btn btn-sm btn-light-alt btn-responsive', 'escape' => false]
                ) ?>

                <?= $this->Form->postLink(
                    sprintf('<i class="fas fa-fw fa-trash"></i> <span class="d-none d-sm-inline">%s</span>', __('Eliminar')),
                    ['action' => 'delete', $entidad->id],
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
                        <div class="col val"><?= h($entidad->nombre) ?></div>
                    </div>
                    <div class="row row-data">
                        <div class="col-xl-3 key"><?= __('Email') ?></div>
                        <div class="col val"><?= h($entidad->email) ?></div>
                    </div>
                    <div class="row row-data">
                        <div class="col-xl-3 key"><?= __('Estado') ?></div>
                        <div class="col val"><?= h($entidad->estado) ?></div>
                    </div>
                </div>
                <div class="card-body border-top numbers">
                    <div class="row row-data">
                        <div class="col-xl-3 key"><?= __('Grupo Id') ?></div>
                        <div class="col val"><?= $this->Number->format($entidad->grupo_id) ?></div>
                    </div>
                    <div class="row row-data">
                        <div class="col-xl-3 key"><?= __('Puntos') ?></div>
                        <div class="col val"><?= $this->Number->format($entidad->puntos) ?></div>
                    </div>
                    <div class="row row-data">
                        <div class="col-xl-3 key"><?= __('Capital') ?></div>
                        <div class="col val"><?= $this->Number->format($entidad->capital) ?></div>
                    </div>
                </div>
                <div class="card-body border-top dates">
                    <div class="row row-data">
                        <div class="col-xl-3 key"><?= __('Fecha Nacimiento') ?></div>
                        <div class="col val"><?= h($entidad->fecha_nacimiento) ?></div>
                    </div>
                    <div class="row row-data">
                        <div class="col-xl-3 key"><?= __('Fecha Hora') ?></div>
                        <div class="col val"><?= h($entidad->fecha_hora) ?></div>
                    </div>
                </div>
                <div class="card-body border-top booleans">
                    <div class="row row-data">
                        <div class="col-xl-3 key"><?= __('Habilitado') ?></div>
                        <div class="col val"><?= $entidad->habilitado ? __('Sí') : __('No'); ?></div>
                    </div>
                </div>
                <div class="card-body border-top texts">
                    <div class="row row-data">
                        <div class="col-xl-3 key"><?= __('Descripcion') ?></div>
                        <div class="col val"><?= $this->Text->autoParagraph(h($entidad->descripcion)); ?></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="ypunto-view-aside">
            <div class="card ypunto-actions-card">
                <?= $this->element('Entity/info', ['entity' => $entidad]) ?>

            </div>
        </section>
    </div>

</div>

<?php $this->append('ypunto-quick-actions') ?>
    <a class="dropdown-item" href="<?= $this->Url->build(['action' => 'add']) ?>"><?= __('Crear Entidad') ?></a>
    <a class="dropdown-item" href="<?= $this->Url->build(['action' => 'index']) ?>"><?= __('Listado de Entidades') ?></a>

<?php $this->end() ?>
