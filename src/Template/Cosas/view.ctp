<?php
/**
 * @var \App\View\AppView $this
 * @var \Ypunto\Admin\Model\Entity\Cosa $cosa
 */
?>

<div class="ypunto-content cosas view">
    <header class="ypunto-content-header">
        <h1 class="ypunto-title"><?= h($cosa->nombre) ?></h1>

        <div class="btn-toolbar" role="toolbar" aria-label="<?= __('Acciones') ?>">
            <div class="btn-group">
                <?= $this->Html->link(
                    __('{icon} Volver al listado', ['icon' => '<i class="fas fa-fw fa-angle-left"></i>']),
                    ['action' => 'index'],
                    ['class' => 'btn btn-sm btn-light-alt', 'escape' => false]
                ) ?>

                <?= $this->Html->link(
                    __('{icon} Editar', ['icon' => '<i class="fas fa-fw fa-pencil-alt"></i>']),
                    ['action' => 'edit', $cosa->id],
                    ['class' => 'btn btn-sm btn-light-alt', 'escape' => false]
                ) ?>

            </div>
            <?= $this->Form->postLink(
                __('{icon} Eliminar', ['icon' => '<i class="fas fa-fw fa-trash"></i>']),
                ['action' => 'delete', $cosa->id],
                ['confirm' => __('Eliminar este registro?'), 'class' => 'btn btn-sm btn-danger ml-4', 'escape' => false]
            ) ?>

        </div>
    </header>

    <div class="ypunto-view">
        <section class="ypunto-view-main">
            <div class="card ypunto-view-info">
                <div class="card-body strings">
                    <div class="row row-data">
                        <div class="col-sm-3 key"><?= __('Entidad') ?></div>
                        <div class="col val"><?= $cosa->has('entidad') ? $this->Html->link($cosa->entidad->nombre, ['controller' => 'Entidades', 'action' => 'view', $cosa->entidad->id]) : '' ?></div>
                    </div>
                    <div class="row row-data">
                        <div class="col-sm-3 key"><?= __('Nombre') ?></div>
                        <div class="col val"><?= h($cosa->nombre) ?></div>
                    </div>
                </div>
                <div class="card-body border-top numbers">
                    <div class="row row-data">
                        <div class="col-sm-3 key"><?= __('Precio') ?></div>
                        <div class="col val"><?= $this->Number->format($cosa->precio) ?></div>
                    </div>
                    <div class="row row-data">
                        <div class="col-sm-3 key"><?= __('Cantidad') ?></div>
                        <div class="col val"><?= $this->Number->format($cosa->cantidad) ?></div>
                    </div>
                </div>
                <div class="card-body border-top texts">
                    <div class="row row-data">
                        <div class="col-sm-3 key"><?= __('Descripcion') ?></div>
                        <div class="col val"><?= $this->Text->autoParagraph(h($cosa->descripcion)); ?></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="ypunto-view-aside">
            <div class="card ypunto-actions-card">
                <div class="card-body bg-light">
                    <ul class="list-unstyled text-muted small mb-0">
                        <li><i class="fas fa-fw fa-fingerprint"></i> <?= __('Id.') ?> <strong class="text-monospace"><?= $this->Number->format($cosa->id) ?></strong></li>
                        <li><i class="far fa-fw fa-calendar-plus"></i> <?= __('Alta') ?> <strong><?= $cosa->created ?></strong></li>                        <li><i class="far fa-fw fa-calendar-check"></i> <?= __('Modificado') ?> <strong><?= $cosa->modified ?></strong></li>                        <li><i class="fas fa-fw fa-history"></i> <?= __('Historial') ?> <a href="#"><?= __('Versiones anteriores') ?></a></li>
                    </ul>
                </div>
            </div>
        </section>
    </div>

</div>

<?php $this->append('ypunto-quick-actions') ?>
    <a class="dropdown-item" href="<?= $this->Url->build(['action' => 'add']) ?>"><?= __('Crear Cosa') ?></a>
    <a class="dropdown-item" href="<?= $this->Url->build(['action' => 'index']) ?>"><?= __('Listado de Cosas') ?></a>
    <div class="dropdown-divider"></div>

    <h6 class="dropdown-header"><?= __('Entidades') ?></h6>
    <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'Entidades', 'action' => 'index']) ?>"><?= __('Listado de Entidades') ?></a>
    <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'Entidades', 'action' => 'add']) ?>"><?= __('Crear Entidad') ?></a>

<?php $this->end() ?>
