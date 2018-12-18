<?php
/**
 * @var \App\View\AppView $this
 * @var \Ypunto\Admin\Model\Entity\Entidad[]|\Cake\Collection\CollectionInterface $entidades
 */
?>

<div class="entidades index">
    <header class="ypunto-content-header">
        <h1 class="ypunto-title"><?= __('Entidades') ?></h1>

        <div class="btn-toolbar" role="toolbar" aria-label="<?= __('Acciones') ?>">
            <a href="<?= $this->Url->build(['action' => 'add']) ?>" class="btn btn-sm btn-light-alt">
                <i class="fas fa-fw fa-plus"></i> <span class="d-none d-md-inline"><?= __('Crear Entidad') ?></span>
            </a>

            <form class="form-inline form-search ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control" type="search" placeholder="Buscar" aria-label="Buscar">
                    <div class="input-group-append">
                        <button class="btn btn-light-alt" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </header>

    <div class="card">
        <div class="sticky-navbar-top bg-white p-0">
            <div class="d-flex p-2 justify-content-between">
<!--                <a href="--><?//= $this->Url->build(['action' => 'add']) ?><!--" class="btn btn-primary">-->
<!--                    <i class="fas fa-plus"></i> <span class="d-none d-md-inline">--><?//= __('Crear Entidad') ?><!--</span>-->
<!--                </a>-->

                <ul class="list-unstyled list-inline my-1">
                    <li class="list-inline-item mx-3"><a href="#">Nuevas</a></li>
                    <li class="list-inline-item mx-3"><a href="#">Inactivas</a></li>
                    <li class="list-inline-item mx-3"><a href="#">Otro filtro</a></li>
                </ul>

                <?= $this->element('Ypunto/Admin.paginator') ?>

            </div>
            <div class="row ypunto-table-headers">
                <div class="col col-id"><?= $this->Paginator->sort('id') ?></div>
                <div class="col col-display-field"><?= $this->Paginator->sort('nombre') ?></div>
                <div class="col-3 col-lg-2"><?= $this->Paginator->sort('grupo_id') ?></div>
                <div class="col-2 d-none d-lg-block"><?= $this->Paginator->sort('email') ?></div>
                <div class="col-2 d-none d-lg-block"><?= $this->Paginator->sort('estado') ?></div>
            </div>
        </div>

        <?php foreach ($entidades as $entidad): ?>
        <div class="ypunto-list-item">
            <div class="col col-id"><?= $this->Number->format($entidad->id) ?></div>
            <div class="col col-display-field">
                <a class="main-action" href="<?= $this->Url->build(['action' => 'view', $entidad->id]) ?>">
                    <span class="display-field"><?= h($entidad->nombre) ?></span>
                    <span class="drop-field"><?= h($entidad->email) ?></span>
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
            <div class="col-3 col-lg-2"><?= $entidad->has('grupo') ? $this->Html->link($entidad->grupo->nombre, ['controller' => 'Grupos', 'action' => 'view', $entidad->grupo->id]) : '' ?></div>
            <div class="col-2 d-none d-lg-block"><?= h($entidad->email) ?></div>
            <div class="col-2 d-none d-lg-block"><?= h($entidad->estado) ?></div>
        </div>
        <?php endforeach; ?>

    </div>
</div>

<?php $this->append('ypunto-quick-actions') ?>
    <a class="dropdown-item" href="<?= $this->Url->build(['action' => 'add']) ?>"><?= __('Crear Entidad') ?></a>
    <div class="dropdown-divider"></div>

    <h6 class="dropdown-header"><?= __('Grupos') ?></h6>
    <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'Grupos', 'action' => 'index']) ?>"><?= __('Listado de Grupos') ?></a>
    <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'Grupos', 'action' => 'add']) ?>"><?= __('Crear Grupo') ?></a>

    <h6 class="dropdown-header"><?= __('History') ?></h6>
    <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'AuditLogs', 'action' => 'index']) ?>"><?= __('Listado de History') ?></a>
    <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'AuditLogs', 'action' => 'add']) ?>"><?= __('Crear History') ?></a>

    <h6 class="dropdown-header"><?= __('Cosas') ?></h6>
    <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'Cosas', 'action' => 'index']) ?>"><?= __('Listado de Cosas') ?></a>
    <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'Cosas', 'action' => 'add']) ?>"><?= __('Crear Cosa') ?></a>

    <h6 class="dropdown-header"><?= __('Etiquetas') ?></h6>
    <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'Etiquetas', 'action' => 'index']) ?>"><?= __('Listado de Etiquetas') ?></a>
    <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'Etiquetas', 'action' => 'add']) ?>"><?= __('Crear Etiqueta') ?></a>

<?php $this->end() ?>
